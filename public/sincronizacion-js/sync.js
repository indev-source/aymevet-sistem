
class Sync{
    
    constructor(productsUrl){
        this.productsUrl = productsUrl;
        this.firebaseObj = null;
        this.db = null;
    }

    set setFirebaseObject(firebaseObj){
        this.firebaseObj = firebaseObj;
    }
    initializeDb(){
        this.db = this.firebaseObj.firestore();
    }

    doSyncWithProducts(sellerId){
        fetch(this.productsUrl).then(response => response.json()).then(products =>{

            
            //do push to firebase
            let productsIterator = Object.entries(products);
            console.log(productsIterator);
            productsIterator.forEach(product =>{
                product[1]['seller'] = sellerId;
                this.doStoreToDb(product[1])
            });
            //this.doStoreToDb(products.data[1]);
        });
    }
    doStoreToDb(data,sellerId){
       this.db.collection('products').add(data);
    }
}

function sincronizar(traspasoId){
    let sellerId = 13;
    const PRODUCTS_URL  = "http://localhost:8000/api/v1/traspaso/"+traspasoId;
    const FIREBASE_CONFIG = {
        apiKey: "AIzaSyDo5ckC7LFvc0BpAS2V_gpFfc3MYJho8zE",
        authDomain: "eymevet-app.firebaseapp.com",
        databaseURL: "https://eymevet-app.firebaseio.com",
        projectId: "eymevet-app",
        storageBucket: "eymevet-app.appspot.com",
        messagingSenderId: "839969301613",
        appId: "1:839969301613:web:5edafe2483be2070430b64"
    };

    firebase.initializeApp(FIREBASE_CONFIG);

    let sync = new Sync(PRODUCTS_URL);
    sync.setFirebaseObject = firebase;

    sync.initializeDb();
    sync.doSyncWithProducts(sellerId);
}


