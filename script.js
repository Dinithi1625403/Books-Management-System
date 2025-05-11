// Firebase Imports
import { initializeApp } from "https://www.gstatic.com/firebasejs/11.6.0/firebase-app.js";
import { getAuth, createUserWithEmailAndPassword, signInWithEmailAndPassword } from "https://www.gstatic.com/firebasejs/11.6.0/firebase-auth.js";
import { getAnalytics } from "https://www.gstatic.com/firebasejs/11.6.0/firebase-analytics.js";
import { getFirestore, doc, setDoc, getDoc } from "https://www.gstatic.com/firebasejs/11.6.0/firebase-firestore.js";

// Firebase Configuration
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
const db = getFirestore(app);
const analytics = getAnalytics(app);

// ==== SIGN UP ====
const signUpBtn = document.getElementById("signUp");
if (signUpBtn) {
    signUpBtn.addEventListener("click", async (event) => {
        event.preventDefault();

        const email = document.getElementById("email").value;
        const password = document.getElementById("password").value;
        const confirmPassword = document.getElementById("confirm-password").value;
        const roleCode = document.getElementById("roleCode").value;

        if (password !== confirmPassword) {
            alert("Passwords do not match!");
            return;
        }

        const role = (roleCode === "admin123") ? "admin" : "user";

        try {
            const userCredential = await createUserWithEmailAndPassword(auth, email, password);
            const user = userCredential.user;

            // Save email & role to Firestore
            await setDoc(doc(db, "users", user.uid), {
                email: user.email,
                role: role
            });

            alert("User created successfully!");
            window.location.href = "login.html";

        } catch (error) {
            alert(error.message);
            console.error("Sign Up Error:", error.message);
        }
    });
}

// ==== LOGIN ====
const loginForm = document.getElementById("login-form");
if (loginForm) {
    loginForm.addEventListener("submit", async (event) => {
        event.preventDefault();

        const email = document.getElementById("email").value;
        const password = document.getElementById("password").value;

        try {
            const userCredential = await signInWithEmailAndPassword(auth, email, password);
            const user = userCredential.user;

            const userDoc = await getDoc(doc(db, "users", user.uid));

            if (userDoc.exists()) {
                const role = userDoc.data().role;
                alert(`Login successful as ${role}`);

                if (role === "admin") {
                    window.location.href = "admin.html";
                } else {
                    window.location.href = "user.html";
                }
            } else {
                alert("User role not found.");
            }

        } catch (error) {
            const errorMessage = error.message;
            const errorElement = document.getElementById("error-message");
            if (errorElement) {
                errorElement.textContent = errorMessage;
                errorElement.style.display = "block";
            } else {
                alert(errorMessage);
            }
            console.error("Login Error:", errorMessage);
        }
    });
}
