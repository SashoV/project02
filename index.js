let catAction = document.getElementById("action");
let catInovation = document.getElementById("inovation");
let catLidership = document.getElementById("lidership");
let catTeam = document.getElementById("team");
let time530 = document.getElementById("5_30");
let time3060 = document.getElementById("30_60");
let time30120 = document.getElementById("30_120");
let time60120 = document.getElementById("60_120");
let time60240 = document.getElementById("60_240");
let time120240 = document.getElementById("120_240");
let size210 = document.getElementById("2_10");
let size240 = document.getElementById("2_40");
let size340 = document.getElementById("3_40");
let size240p = document.getElementById("2_40p");
let all = document.getElementById("all");
let searchBtn = document.getElementById("btn-get-cards");
searchBtn.addEventListener("click", handle);
let allGameCards = document.getElementsByClassName('my-card');
let p = document.createElement('p');
let gameCards = document.querySelector('.cards');
let winWidth = window.matchMedia("(max-width: 767px)");

filterStart();
window.addEventListener("resize", filterResizePosition);



function filterResizePosition() {
  let filterTop = document.getElementById('top_filter');
  let filterBottom = document.getElementById('filter_bottom');
  if (winWidth.matches) {
    filterTop.remove();
    filterBottom.appendChild(filterTop);
  } else {
    filterTop.remove();
    document.getElementById('background_diagonal_part1').appendChild(filterTop);
  }
}

function filterStart() {
  let filterTop = document.getElementById('top_filter');
  let filterBottom = document.getElementById('filter_bottom');
  if (winWidth.matches) {
    filterTop.remove();
    filterBottom.appendChild(filterTop);
  }
}



if (winWidth.matches) {
  var prevScrollpos = window.pageYOffset;
  window.onscroll = function () {
    var currentScrollPos = window.pageYOffset;
    if (prevScrollpos > currentScrollPos) {
      document.querySelector(".my_navbar").style.top = "0";
      document.querySelector("#all_content").style.marginTop = "0";
    } else {
      document.querySelector(".my_navbar").style.top = "-180px";
      document.querySelector("#all_content").style.marginTop = "-180px";
    }
    prevScrollpos = currentScrollPos;
  }
}



function handle() {

  let niza1 = [];
  let niza2 = [];
  let niza3 = [];
  let nothingToShow = document.getElementById('nothingToShow');

  if (nothingToShow !== null) {
    nothingToShow.remove();
  }

  hideAll();

  if (all.checked) {
    niza3 = Array.from(allGameCards);
    all.checked = false;
  }

  if (catAction.checked) {
    let i = 0;
    let x = document.getElementsByClassName('Акција');
    while (i < x.length) {
      niza1.push(x[i]);
      i++;
    }
  }

  if (catInovation.checked) {
    let i = 0;
    let x = document.getElementsByClassName('Иновации');
    while (i < x.length) {
      niza1.push(x[i]);
      i++;
    }
  }

  if (catLidership.checked) {
    let i = 0;
    let x = document.getElementsByClassName('Лидерство');
    while (i < x.length) {
      niza1.push(x[i]);
      i++;
    }
  }

  if (catTeam.checked) {
    let i = 0;
    let x = document.getElementsByClassName('Тим');
    while (i < x.length) {
      niza1.push(x[i]);
      i++;
    }
  }


  if ((catAction.checked == false && catInovation.checked == false && catLidership.checked == false && catTeam.checked == false) && niza1.length === 0) {
    niza1 = Array.from(allGameCards);
  }

  if (time530.checked) {
    let i = 0;
    while (i < niza1.length) {
      if (niza1[i].classList[4] == "5-30")
        niza2.push(niza1[i]);
      i++;
    }
  }

  if (time3060.checked) {
    let i = 0;
    while (i < niza1.length) {
      if (niza1[i].classList[4] == "30-60")
        niza2.push(niza1[i]);
      i++;
    }
  }

  if (time30120.checked) {
    let i = 0;
    while (i < niza1.length) {
      if (niza1[i].classList[4] == "30-120")
        niza2.push(niza1[i]);
      i++;
    }
  }

  if (time60120.checked) {
    let i = 0;
    while (i < niza1.length) {
      if (niza1[i].classList[4] == "60-120")
        niza2.push(niza1[i]);
      i++;
    }
  }

  if (time60240.checked) {
    let i = 0;
    while (i < niza1.length) {
      if (niza1[i].classList[4] == "60-240")
        niza2.push(niza1[i]);
      i++;
    }
  }

  if (time120240.checked) {
    let i = 0;
    while (i < niza1.length) {
      if (niza1[i].classList[4] == "120-240")
        niza2.push(niza1[i]);
      i++;
    }
  }

  if ((time530.checked == false && time3060.checked == false && time30120.checked == false && time60120.checked == false && time60240.checked == false && time120240.checked == false) && niza2.length === 0) {
    niza2 = niza1;
  }


  if (size210.checked) {
    let i = 0;
    while (i < niza2.length) {
      if (niza2[i].classList[6] == "2-10")
        niza3.push(niza2[i]);
      i++;
    }
  }

  if (size240.checked) {
    let i = 0;
    while (i < niza2.length) {
      if (niza2[i].classList[6] == "2-40")
        niza3.push(niza2[i]);
      i++;
    }
  }

  if (size340.checked) {
    let i = 0;
    while (i < niza2.length) {
      if (niza2[i].classList[6] == "3-40")
        niza3.push(niza2[i]);
      i++;
    }
  }

  if (size240p.checked) {
    let i = 0;
    while (i < niza2.length) {
      if (niza2[i].classList[6] == "2-40+")
        niza3.push(niza2[i]);
      i++;
    }
  }


  if ((size210.checked == false && size240.checked == false && size340.checked == false && size240p.checked == false) && niza3.length === 0) {
    niza3 = niza2;
  }

  if (niza3.length == 0) {
    p.innerHTML = "Нема таква игра";
    gameCards.appendChild(p);
    p.setAttribute('id', 'nothingToShow');
  }


  let i = 0;
  while (i < niza3.length) {
    niza3[i].style.display = "block";
    i++;
  }

}

function hideAll() {
  let allCards = document.querySelectorAll(".my-card");
  let i = 0;
  while (i < allCards.length) {
    allCards[i].style.display = "none";
    i++;
  }
}


function uncheckAll() {
  let buttons = document.getElementsByClassName('checkBtn');
  let j = 0;
  while (j < buttons.length) {
    buttons[j].checked = false;
    j++;
  }
}

function saveId(saveId) {
  document.getElementById('hidden').setAttribute('value', saveId)
}


function openNav() {
  document.getElementById("myNav").style.width = "300px";
}


function closeNav() {
  document.getElementById("myNav").style.width = "0";
}


