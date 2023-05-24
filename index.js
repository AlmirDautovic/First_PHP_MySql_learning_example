function displayUsers() {
    var container = document.getElementById('display');
    container.innerHTML = "";
    axios.get('http://localhost/PHP-Example/ajax_data.php')
        .then(res => {
            console.log(res.data)
            var users = res.data;
            for (let user of users) {
                container.innerHTML = createUserContent(users)
            }

        })
        .catch(err => console.log(err));
}

function createUserContent(users) {
    var content = '';
    for (let user of users) {
        content += `
        <div class="row">
           <div class="col s12 m6">
                <div class="card blue-grey darken-1">
                    <div class="card-content white-text">
                        <span class="card-title">Nr. ${user.id} - ${user.name}</span>
                        <p>${user.email}</p>
                        <p>${user.age}</p>
                        <p>${user.message}</p>
                    </div>
                </div>
            </div>
        </div>
        `
    }
    return content;
}