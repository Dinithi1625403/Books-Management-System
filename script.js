
  // Import the functions you need from the SDKs you need
  import { initializeApp } from "https://www.gstatic.com/firebasejs/11.6.0/firebase-app.js";
  import { getAnalytics } from "https://www.gstatic.com/firebasejs/11.6.0/firebase-analytics.js";
  // TODO: Add SDKs for Firebase products that you want to use
  // https://firebase.google.com/docs/web/setup#available-libraries

  // Your web app's Firebase configuration
  // For Firebase JS SDK v7.20.0 and later, measurementId is optional
  const firebaseConfig = {
    apiKey: "AIzaSyAE8WYOlUJiV-IIkkRvZ4oTMavzTjUXyiI",
    authDomain: "bookmangement-dini.firebaseapp.com",
    projectId: "bookmangement-dini",
    storageBucket: "bookmangement-dini.firebasestorage.app",
    messagingSenderId: "1078063163280",
    appId: "1:1078063163280:web:f03f74390b516af1e33515",
    measurementId: "G-HHP9Y9BBTP"
  };

  // Initialize Firebase
  const app = initializeApp(firebaseConfig);
  const analytics = getAnalytics(app);
