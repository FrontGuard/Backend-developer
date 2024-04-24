document.addEventListener('DOMContentLoaded', function() {
    fetch('backend/get_users.php')
        .then(response => response.json())
        .then(data => {
            const userListDiv = document.getElementById('userList');
            userListDiv.innerHTML = '';

            if (data.length > 0) {
                data.forEach(user => {
                    const userDiv = document.createElement('div');
                    userDiv.textContent = `Ім'я: ${user.username}, Електронна адреса: ${user.email}`;
                    userListDiv.appendChild(userDiv);
                });
            } else {
                userListDiv.textContent = 'Список користувачів порожній';
            }
        })
        .catch(error => console.error('Помилка при отриманні списку користувачів:', error));
});
