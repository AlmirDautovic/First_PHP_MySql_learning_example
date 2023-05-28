function displayUsers() {
    var container = document.getElementById('display');
    container.innerHTML = "";
    axios.get('http://localhost/PHP-Example/ajax_data.php')
        .then(res => {
            var users = res.data;
            container.innerHTML = createUserContent(users);
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
                        <p>User email: ${user.email}</p>
                        <p>Age: ${user.age}</p>
                        <p>Message: ${user.message}</p>
                    </div>
                </div>
            </div>
        </div>
        `
    }
    return content;
}