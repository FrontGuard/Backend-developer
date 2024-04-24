document.getElementById('registrationForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Перешкоджаємо стандартній відправці форми

    // Отримуємо дані з форми
    const formData = new FormData(this);
    const userData = {
        name: formData.get('name'),
        email: formData.get('email'),
        password: formData.get('password')
    };

    // Відправляємо дані на сервер за допомогою Fetch API
    fetch('backend/register.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(userData)
    })
        .then(response => {
            if (response.ok) {
                // Реєстрація успішна, можна виконати потрібні дії
                alert('Реєстрація успішна!');
                // Очистимо поля форми
                this.reset();
            } else {
                // Помилка реєстрації, виведемо повідомлення про помилку
                return response.json().then(data => {
                    throw new Error(data.message);
                });
            }
        })
        .catch(error => {
            alert('Помилка реєстрації: ' + error.message);
        });
});

// Отримання списку користувачів
fetch('backend/get_users.php')
    .then(response => response.json())
    .then(data => {
        const userListDiv = document.getElementById('userList');
        userListDiv.innerHTML = '';
        data.forEach(user => {
            const userDiv = document.createElement('div');
            userDiv.textContent = `Ім'я: ${user.name}, Електронна адреса: ${user.email}`;
            userListDiv.appendChild(userDiv);
        });
    })
    .catch(error => console.error('Помилка при отриманні списку користувачів:', error));
