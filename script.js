document.addEventListener('DOMContentLoaded', () => {
    // Google Sign-In button functionality
    const googleSignInButton = document.getElementById('google-signin');
    const googleSignUpButton = document.getElementById('google-signup');

    if (googleSignInButton) {
        googleSignInButton.addEventListener('click', () => {
            gapi.auth2.getAuthInstance().signIn();
        });
    }

    if (googleSignUpButton) {
        googleSignUpButton.addEventListener('click', () => {
            gapi.auth2.getAuthInstance().signIn();
        });
    }

    gapi.load('auth2', () => {
        gapi.auth2.init({
            client_id: 'YOUR_GOOGLE_CLIENT_ID'
        }).then(() => {
            const auth2 = gapi.auth2.getAuthInstance();
            auth2.isSignedIn.listen(updateSignInStatus);
        });
    });

    function updateSignInStatus(isSignedIn) {
        if (isSignedIn) {
            window.location.href = 'profile.html';
        }
    }
});
