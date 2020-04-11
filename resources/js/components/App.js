import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import MediaHandler from '../MediaHandler';
import Pusher from 'pusher-js';
import Peer from 'simple-peer';

const APP_KEY = 'b940dfa008d542bbb9bc';

export default class App extends Component {
    constructor(){
        super();
        this.state = {
            hasMedia:false,
            otherUserId:null
        }
        this.user = window.user;
        this.user.stream = null;
        this.peers = {};
        this.mediaHandler = new MediaHandler();
        this.setupPusher();
        this.callTo = this.callTo.bind(this);
        this.setupPusher = this.setupPusher.bind(this);
        this.startPeer = this.startPeer.bind(this);
    }
    UNSAFE_componentWillMount() {
        this.mediaHandler.getPermissions()
            .then((stream)=>{
                this.setState({hasMedia:true});
                this.user.stream = stream;
                try {
                    this.myVideo.srcObject = stream;
                }catch (e) {
                    this.myVideo.src = URL.createObjectURL(stream);
                }
                this.myVideo.muted = true;
                this.myVideo.play();
            })

    }
    setupPusher(){
        Pusher.logToConsole = true;
        this.pusher = new Pusher(APP_KEY,{
            authEndpoint:`/pusher/auth`,
            cluster:'eu',
            auth:{
                params:this.user.id,
                headers:{
                    'X-CSRF-Token':window.csrfToken
                }
            }

        });
        this.channel = this.pusher.subscribe('presence-video-channel');
        this.channel.bind(`client-signal-${this.user.id}`,(signal)=>{
            let peer = this.peers[signal.userId];
            if(peer === undefined){
                this.setState({otherUserId: signal.userId});
                peer = this.startPeer(signal.userId,false);
            }
            peer.signal(signal.data);
        });
        this.channel.bind('client-sdp',()=>{
            var answer = confirm("You have a call from: "+ this.user.id + "Would you like to answer?");
            if(!answer){
                return this.channel.trigger("client-reject");
            }else {
                window.location.replace(`/chat/videocoference/${this.user.id}`);
            }
        })
    }
    startPeer(userId,initiator = true){
        const peer = new Peer({
           initiator,
            stream: this.user.stream,
            trickle: false
        });
        peer.on('signal',(data)=>{
            console.log(data);
            this.channel.trigger(`client-signal-${userId}`,{
                type:'signal',
                userId: this.user.id,
                data:data
            });
        });
        peer.on('cl')
        peer.on('stream',(stream)=>{
            try {
                this.userVideo.srcObject = stream;
            }catch (e) {
                this.userVideo.src = URL.createObjectURL(stream);
            }
            this.userVideo.play();
        });
        peer.on('close',()=>{
            let peer = this.peers[userId];
            if(peer != undefined){
                peer.destroy();
            }
            this.peers[userId] = undefined;
        });
        return peer;
    }
    callTo(userId){
        this.peers[userId] = this.startPeer(userId);
    }
    mute(){
        this.user.stream.getAudioTracks()[0].enabled = !(this.user.stream.getAudioTracks()[0].enabled);
    }
    isMuted(){
        if(this.user.stream.getAudioTracks()[0].enabled === true){
            return true;
        }else {
            return false;
        }
    }


    render() {

        return (
            <div className="App">
                <div className="video-container">
                    <video className="my-video" ref={(ref)=> {this.myVideo= ref;}}></video>
                    <video className="user-video" ref={(ref)=> {this.userVideo= ref;}}></video>
                        <div className="container controls-container">
                            <ul>
                                <li className="float-left px-2"><button className="btn btn-danger btn-circle btn-xl" onClick={()=>window.close()}><i className="fas fa-times"></i></button></li>
                                <li className="float-left px-2"><button className="btn btn-orange btn-circle btn-xl" onClick={()=>this.mute()}><i className="fas fa-microphone-slash"></i></button></li>
                                <li className="float-left px-2"><button className="btn btn-success btn-circle btn-xl" onClick={()=>this.callTo(window.recipient_id)}><i className="fas fa-phone"></i></button></li>
                            </ul>
                        </div>
                </div>

            </div>
        );
    }
}

if (document.getElementById('application')) {
    ReactDOM.render(<App />, document.getElementById('application'));
}
