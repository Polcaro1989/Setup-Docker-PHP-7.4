const productAlert = document.getElementById("product-alert");
const productText = document.getElementById("product-text");
const productImage = document.getElementById("product-image");
const names = [""];
const products = [
  {
    name: "Abraão Polcaro",
    image: "1679067787215.jpeg",
  },
];

function getRandomItemFromArray(arr) {
  return arr[Math.floor(Math.random() * arr.length)];
}

function getRandomTime() {
  return Math.floor(Math.random() * 59) + 1;
}

const getRandomDisplayTime = () => Math.random() * (8 - 3) + 3;

const getCurrentDateTime = () => {
  const currentDate = new Date();
  const hours = currentDate.getHours();
  const minutes = currentDate.getMinutes();
  const day = currentDate.getDate();
  const month = currentDate.getMonth() + 1;
  const year = currentDate.getFullYear();
  return `${day}/${month}/${year} ${hours}:${minutes}`;
};

const showAlert = () => {
  const randomName = getRandomItemFromArray(names);
  const randomProduct = getRandomItemFromArray(products);
  const { name, image } = randomProduct;
  productImage.src = image;
  productImage.style.width = "100px";
  productImage.style.height = "100px";
  productImage.style.marginRight = "10px";
  productImage.style.borderRadius = "100%";
  productText.innerHTML = `<p class="message text-white">${randomName} Bem-vindo(a) ${name} - ${getCurrentDateTime()}</p>`;
  productAlert.style.display = "flex";
  productAlert.classList.add("bg-line");
  productAlert.style.position = "fixed";
  productAlert.style.top = "90px"; // Ajuste a distância do topo conforme necessário
  productAlert.style.left = "20px"; // Ajuste a distância da esquerda conforme necessário
  productAlert.style.height = "fit-content"; // Definindo a altura para 'fit-content'
  
  setTimeout(() => {
    productAlert.style.display = "none";
    productAlert.classList.remove("bg-line");
    setTimeout(showAlert, Math.floor(getRandomDisplayTime()) * 10000); // Chamando showAlert novamente após um intervalo de tempo
  }, 8000); // Fechamento automático após 8 segundos
};

showAlert(); // Chamando showAlert inicialmente
