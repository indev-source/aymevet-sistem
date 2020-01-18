class FirebaseConfig{
    constructor(config){
        this.config = config;
    }
    initialize(){
        firebase.initializeApp(this.config);
    }
}

const FIREBASE_CONFIG = {
    apiKey: "AIzaSyDo5ckC7LFvc0BpAS2V_gpFfc3MYJho8zE",
    authDomain: "eymevet-app.firebaseapp.com",
    databaseURL: "https://eymevet-app.firebaseio.com",
    projectId: "eymevet-app",
    storageBucket: "eymevet-app.appspot.com",
    messagingSenderId: "839969301613",
    appId: "1:839969301613:web:5edafe2483be2070430b64"
};

let firebaseConfig = new FirebaseConfig(FIREBASE_CONFIG);
firebaseConfig.initialize();