import { initializeApp } from "https://www.gstatic.com/firebasejs/11.6.0/firebase-app.js";
import { getAuth, createUserWithEmailAndPassword, signInWithEmailAndPassword } from "https://www.gstatic.com/firebasejs/11.6.0/firebase-auth.js";
import { getAnalytics } from "https://www.gstatic.com/firebasejs/11.6.0/firebase-analytics.js";

// Your web app's Firebase configuration
const firebaseConfig = {
    apiKey: "AIzaSyAE8WYOlUJiV-IIkkRvZ4oTMavzTjUXyiI",
    authDomain: "bookmangement-dini.firebaseapp.com",
    projectId: "bookmangement-dini",
    storageBucket: "bookmangement-dini.appspot.com",
    messagingSenderId: "1078063163280",
    appId: "1:1078063163280:web:f03f74390b516af1e33515",
    measurementId: "G-HHP9Y9BBTP"
};

// Initialize Firebase
const app = initializeApp(firebaseConfig);
const auth = getAuth(app);
const analytics = getAnalytics(app);

// Sign Up logic
const signUpBtn = document.getElementById("signUp");
if (signUpBtn) {
    signUpBtn.addEventListener("click", (event) => {
        event.preventDefault();

        const email = document.getElementById("email").value;
        const password = document.getElementById("password").value;
        const confirmPassword = document.getElementById("confirm-password").value;

        if (password !== confirmPassword) {
            alert("Passwords do not match!");
            return;
        }

        createUserWithEmailAndPassword(auth, email, password)
            .then((userCredential) => {
                const user = userCredential.user;
                console.log("User created:", user);
                alert("User created successfully!");
                window.location.href = "login.html";
            })
            .catch((error) => {
                alert(error.message);
                console.error("Sign Up Error:", error.message);
            });
    });
}

// Login logic
const loginForm = document.getElementById("login-form");
if (loginForm) {
    loginForm.addEventListener("submit", (event) => {
        event.preventDefault();

        const email = document.getElementById("email").value;
        const password = document.getElementById("password").value;

        signInWithEmailAndPassword(auth, email, password)
            .then((userCredential) => {
                const user = userCredential.user;
                alert("Login successful!");
                console.log("Logged in user:", user);
                // Redirect or do something after login
            })
            .catch((error) => {
                const errorMessage = error.message;
                const errorElement = document.getElementById("error-message");
                if (errorElement) {
                    errorElement.textContent = errorMessage;
                    errorElement.style.display = "block";
                } else {
                    alert(errorMessage);
                }
                console.error("Login Error:", errorMessage);
            });
    });
}
