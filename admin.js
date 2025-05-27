document.addEventListener("DOMContentLoaded", async () => {
                    // Check if Firebase Auth is available
                    if (typeof firebase !== "undefined" && firebase.auth) {
                        firebase.auth().onAuthStateChanged(async (user) => {
                            if (user) {
                                // Fetch user name from Firestore
                                const db = firebase.firestore();
                                const userDoc = await db.collection("users").doc(user.uid).get();
                                let name = user.displayName || "Admin";
                                if (userDoc.exists && userDoc.data().name) {
                                    name = userDoc.data().name;
                                }
                                document.getElementById("admin-name").textContent = name;
                                document.getElementById("admin-avatar").src =
                                    `https://ui-avatars.com/api/?name=${encodeURIComponent(name)}&background=0D8ABC&color=fff&size=32`;
                                document.getElementById("admin-info").style.display = "inline-block";
                            }
                        });
                    }
                });