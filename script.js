

import { initializeApp } from "https://www.gstatic.com/firebasejs/11.6.0/firebase-app.js";
import { getAuth, createUserWithEmailAndPassword, signInWithEmailAndPassword } from "https://www.gstatic.com/firebasejs/11.6.0/firebase-auth.js";
import { getAnalytics } from "https://www.gstatic.com/firebasejs/11.6.0/firebase-analytics.js";
import { getFirestore, collection, addDoc, getDocs } from "https://www.gstatic.com/firebasejs/11.6.0/firebase-firestore.js";
import { getAuth, signInWithEmailAndPassword } from "https://www.gstatic.com/firebasejs/11.6.0/firebase-auth.js";
// Your web app's Firebase configuration
const firebaseConfig = {
    apiKey: "AIzaSyAE8WYOlUJiV-IIkkRvZ4oTMavzTjUXyiI",
    authDomain: "bookmangement-dini.firebaseapp.com",
    projectId: "bookmangement-dini",
    storageBucket: "bookmangement-dini.appspot.com", // Corrected here
    messagingSenderId: "1078063163280",
    appId: "1:1078063163280:web:f03f74390b516af1e33515",
    measurementId: "G-HHP9Y9BBTP"
};

// Initialize Firebase
const app = initializeApp(firebaseConfig);
const analytics = getAnalytics(app);

const signUp = document.getElementById("signUp");
signUp.addEventListener('click', (event) => {
    event.preventDefault();
    const email = document.getElementById("email").value;
    const password = document.getElementById("password").value;
    const auth = getAuth();
    createUserWithEmailAndPassword(auth, email, password)
        .then((userCredential) => {
            // Signed in
            const user = userCredential.user;
            console.log(user);
            alert("User Created");
        })
        .catch((error) => {
            const errorCode = error.code;
            const errorMessage = error.message;
            alert(errorMessage);
        });
});

const auth = getAuth(app);

const loginForm = document.getElementById("login-form");
loginForm.addEventListener("submit", (event) => {
    event.preventDefault();

    const email = document.getElementById("email").value;
    const password = document.getElementById("password").value;

    signInWithEmailAndPassword(auth, email, password)
        .then((userCredential) => {
            const user = userCredential.user;
            alert("Login Successful!");
            console.log("User:", user);
        })
        .catch((error) => {
            const errorMessage = error.message;
            const errorElement = document.getElementById("error-message");
            if (errorElement) {
                errorElement.textContent = errorMessage;
                errorElement.style.display = "block"; // Make sure it's visible
            }
            console.error("Firebase login error:", errorMessage);
        });
        
});