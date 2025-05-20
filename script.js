const colors = [
  'red', 'blue', 'green', 'yellow', 'orange', 'purple', 'pink',
  'brown', 'black', 'white', 'gray', 'skyblue', 'lightgreen',
  'crimson', 'gold', 'indigo', 'teal', 'salmon', 'violet', 'cyan'
];

const btn = document.getElementById('btn');
const color = document.querySelector('.color');

btn.addEventListener('click', () => {
  const randomColor = colors[getRandomNumber()];
  document.body.style.backgroundColor = randomColor;
  color.textContent = randomColor;
});

function getRandomNumber() {
  return Math.floor(Math.random() * colors.length);
}

const container = document.getElementById("carousel-container");
const content = document.getElementById("carousel-content");
const btnPrev = document.getElementById("prev");
const btnNext = document.getElementById("next");

let dataMahasiswa = [];
let index = 0;

fetch('data.php')
  .then(res => res.json())
  .then(data => {
    if (data.length <= 1) {
      container.style.display = "none"; // sembunyikan carousel-container
      return;
    }

    dataMahasiswa = data;
    container.classList.remove("hidden");

    showMahasiswa(index); 
  });

function showMahasiswa(i) {
  const mhs = dataMahasiswa[i];
  content.innerHTML = `
    <div>
      <p>Nama: ${mhs.nama}</p>
      <p>NPM: ${mhs.npm}</p>
      <p>Kelas: ${mhs.kelas}</p>
      <p>Prodi: ${mhs.prodi}</p>
    </div>
  `;
}

btnNext.addEventListener("click", () => {
  index = (index + 1) % dataMahasiswa.length;
  showMahasiswa(index);
});

btnPrev.addEventListener("click", () => {
  index = (index - 1 + dataMahasiswa.length) % dataMahasiswa.length;
  showMahasiswa(index);
});
