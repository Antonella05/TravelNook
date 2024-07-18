const signUpButton = document.getElementById('signUp');
const signInButton = document.getElementById('signIn');
const container = document.getElementById('container');

signUpButton.addEventListener('click', () => {
    container.classList.add('right-panel-active');

    fetch('signup.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({
            name: document.querySelector('input[name="name"]').value,
            email: document.querySelector('input[name="email"]').value,
            password: document.querySelector('input[name="password"]').value
        }),
    })
    .then(response => response.json())
    .then(data => {
        console.log('Réponse du serveur :', data);
    })
    .catch(error => {
        console.error('Erreur lors de la requête fetch:', error);
    });
});

signInButton.addEventListener('click', () => {
    container.classList.remove('right-panel-active');
    
});
