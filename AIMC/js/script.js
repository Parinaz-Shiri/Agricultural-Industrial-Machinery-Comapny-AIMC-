// SEARCH
const searchItem = document.querySelector('#searchInput');
const searchBtn = document.querySelector('button#searchBtn');
const products = document.querySelectorAll('.product');
const mainSection = document.querySelector('.main-section');
function search() {
	// console.log('hello', products);
	if (!searchItem.value) return;
	mainSection.innerHTML = '';
	let match = false;
	products.forEach(product=>{
		let title = product.querySelector('.card-title').innerText.toLowerCase();
		if(title.includes(searchItem.value.toLowerCase())){
			mainSection.appendChild(product)
			match = true;
		}
	});	
	if (!match) {
		mainSection.innerHTML = `
		<div class="d-flex mx-auto">
			<h3 class="text-danger text-center">No '${searchItem.value}' Found</h3>
		</div>`;	
	}
}

searchBtn.addEventListener('click', search)

document.addEventListener('keyup', (e)=>{
	if(e.keyCode !== 13) return;
	let isFocused = (document.activeElement === searchItem) 
	if(isFocused){
		this.search()
	}
});

// CART
const cart = document.querySelector('.cart span');

const cartProducts = document.querySelector('.cart-products .table tbody'); // get el to fill


function addProduct() {    
	const pid = this.dataset.pid;
	const parent = this.parentNode;
	const title = parent.querySelector('.card-title').innerHTML;
	const price = parent.querySelector('.price').innerHTML;

	let prod = JSON.parse(localStorage.getItem('myCart')) || [];

	const item = {
      p_id : pid,
      title,
      price
    };

	prod.push(item);
	localStorage.setItem('myCart', JSON.stringify(prod));
	cart.textContent = ' ' + prod.length;
    
}

function populate() { // get items on page load
	let prod = JSON.parse(localStorage.getItem('myCart')) || 0;
	if(prod) cart.textContent = prod.length + ' ';

	if (!cartProducts || prod == 0) return;

	let total = 0;
	prod.forEach( function(el) {
		let t = el.price.split('').filter(a=> !isNaN(a)).join(''); //convert to number
		total += Number(t); 
	});

	prod = prod.filter((p, index, self) => // filter duplicate
	  	index === self.findIndex((t) => (
	    	t.p_id === p.p_id
	  	))
	);

	
	prod.forEach( function(p) { // fill the cart products

		const el = document.createElement('tr');
		el.innerHTML = (` 
			<th>${p.p_id}</th>
			<td>${p.title}</td>
			<td>${p.price}</td>
		`); 
  		cartProducts.appendChild(el);  
	});

	cartProducts.append('Total : $' + total);  
	

};

populate();

products.forEach( function(element) {
	btnAdd = element.querySelector('.buy-button');
	btnAdd.addEventListener('click', addProduct)
});

const btnCheckout = document.querySelector('.btn-checkout'); // cart checkou
function checkout(argument) {
	localStorage.removeItem('myCart');

	cartProducts.innerHTML = '';
	cart.textContent = '0 ';
}
if (btnCheckout) {
	btnCheckout.addEventListener('click', checkout);
}
