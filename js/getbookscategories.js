function showData(data) {

    const navFrag = document.createDocumentFragment(); 
    
    for(const key in data.products) {
        const li = document.createElement('li');

        sHtml = `<a class="dropdown-item" href="./index.php?category=${data.products[key].name}">${data.products[key].name}</a>`;

        li.innerHTML = sHtml;

        navFrag.appendChild(li);
   }

   document.getElementById("nav-place").appendChild(navFrag);
}


fetch("data/category.json")
    .then(Response => Response.json())
    .then(data => showData(data));