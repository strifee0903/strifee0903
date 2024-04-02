function startListen() {
  const slider1 = document.querySelector(".list-y");
  const slider2 = document.querySelector(".list-x");
  const prev_button1 = document.querySelector(".prev1");
  const next_button1 = document.querySelector(".next1");
  const prev_button2 = document.querySelector(".prev2");
  const next_button2 = document.querySelector(".next2");
  let isDown = false;
  let startX;
  let scrollLeft;
  if (slider1 && next_button1) {
    next_button1.addEventListener("mousedown", (event) => {
      isDown = true;
      slider1.classList.add("active");
      scrollLeft = slider1.scrollLeft;
    });
  }
  if (slider2 && next_button2) {
    next_button2.addEventListener("mousedown", (event) => {
      isDown = true;
      slider2.classList.add("active");
      scrollLeft = slider2.scrollLeft;
    });
  }
  if (slider1 && next_button1) {
    next_button1.addEventListener("mouseup", (event) => {
      if (!isDown) return;
      event.preventDefault();
      slider1.scrollLeft = scrollLeft + 300;
      isDown = false;
      slider1.classList.remove("active");
    });
  }
  if (slider2 && next_button2) {
    next_button2.addEventListener("mouseup", (event) => {
      if (!isDown) return;
      event.preventDefault();
      slider2.scrollLeft = scrollLeft + 300;
      isDown = false;
      slider2.classList.remove("active");
    });
  }
  if (slider1 && prev_button1) {
    prev_button1.addEventListener("mousedown", (event) => {
      isDown = true;
      slider1.classList.add("active");
      scrollLeft = slider1.scrollLeft;
    });
  }
  if (slider2 && prev_button2) {
    prev_button2.addEventListener("mousedown", (event) => {
      isDown = true;
      slider2.classList.add("active");
      scrollLeft = slider2.scrollLeft;
    });
  }
  if (slider1 && prev_button1) {
    prev_button1.addEventListener("mouseup", (event) => {
      if (!isDown) return;
      event.preventDefault();
      slider1.scrollLeft = scrollLeft - 300;
      isDown = false;
      slider1.classList.remove("active");
    });
  }
  if (slider2 && prev_button2) {
    prev_button2.addEventListener("mouseup", (event) => {
      if (!isDown) return;
      event.preventDefault();
      slider2.scrollLeft = scrollLeft - 300;
      isDown = false;
      slider2.classList.remove("active");
    });
  }
  if (slider1) {
    slider1.addEventListener("mousedown", (event) => {
      isDown = true;
      slider1.classList.add("active");
      startX = event.pageX - slider1.offsetLeft;
      scrollLeft = slider1.scrollLeft;
    });
  }
  if (slider2) {
    slider2.addEventListener("mousedown", (event) => {
      isDown = true;
      slider2.classList.add("active");
      startX = event.pageX - slider2.offsetLeft;
      scrollLeft = slider2.scrollLeft;
    });
  }
  if (slider1) {
    slider1.addEventListener("mouseleave", () => {
      isDown = false;
      slider1.classList.remove("active");
    });
  }
  if (slider2) {
    slider2.addEventListener("mouseleave", () => {
      isDown = false;
      slider2.classList.remove("active");
    });
  }
  if (slider1) {
    slider1.addEventListener("mouseup", () => {
      isDown = false;
      slider1.classList.remove("active");
    });
  }
  if (slider2) {
    slider2.addEventListener("mouseup", () => {
      isDown = false;
      slider2.classList.remove("active");
    });
  }
  if (slider1) {
    slider1.addEventListener("mousemove", (e) => {
      if (!isDown) return;
      e.preventDefault();
      const x = e.pageX - slider1.offsetLeft;
      const walk = (x - startX) * 1;
      slider1.scrollLeft = scrollLeft - walk;
    });
  }
  if (slider2) {
    slider2.addEventListener("mousemove", (e) => {
      if (!isDown) return;
      e.preventDefault();
      const x = e.pageX - slider2.offsetLeft;
      const walk = (x - startX) * 1;
      slider2.scrollLeft = scrollLeft - walk;
    });
  }
  // ------------------------------------------------------------------------------------------------
  const reviewID = document.getElementById("reviewID");
  if (reviewID) {
    reviewID.addEventListener("click", openPage(event, "Reviews"));
  }
}
// -------------------------------------------------------------------------------------------------
function displayDefault() {
  document.getElementById("defaultOpen").click();
}
document.addEventListener("DOMContentLoaded", function () {
  displayDefault();
});

function openPage(evt, pageName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" atv", "");
  }
  document.getElementById(pageName).style.display = "block";
  evt.currentTarget.className += " atv";

  if (pageName === "FAQs") {
    document.querySelector(".headFAQ").style.display = "block";
    document.querySelector(".headReview").style.display = "none"; // Ẩn tiêu đề Reviews nếu hiển thị tab FAQs
    tablinks[0].classList.add("atv");
  } else {
    document.querySelector(".headFAQ").style.display = "none"; // Ẩn tiêu đề FAQs nếu hiển thị tab Reviews
    document.querySelector(".headReview").style.display = "block";
    tablinks[1].classList.add("atv");
  }
}
// --------------------------------------FAQ--------------------------------------------------------
document.addEventListener("DOMContentLoaded", function () {
  const questionContainers = document.querySelectorAll(".question-container");

  questionContainers.forEach(function (container) {
    const question = container.querySelector(".question");
    const arrow = container.querySelector(".arrow-down");
    const answerContainer = container.nextElementSibling;

    let isHidden = true;

    question.addEventListener("click", toggleAnswer);
    arrow.addEventListener("click", toggleAnswer);

    function toggleAnswer() {
      if (isHidden) {
        answerContainer.style.display = "block";
        arrow.style.transform = "rotate(180deg)";
      } else {
        answerContainer.style.display = "none";
        arrow.style.transform = "rotate(0deg)";
      }
      isHidden = !isHidden;
    }
  });
});
// -----------------Review-------------------
function openModal() {
  var modal = document.getElementById("modal");
  modal.style.display = "block";
}

function closeModal() {
  // Ẩn modal
  var modal = document.getElementById("modal");
  modal.style.display = "none";
}

// ------------------------------------
let slideIndex = 0;
function plusSlides(n) {
  showSlides((slideIndex += n));
}
function autoSlide() {
  showSlides((slideIndex += 1));
  setTimeout(autoSlide, 5000);
}
function currentSlide(n) {
  showSlides((slideIndex = n));
}

function showSlides(n) {
  let i;
  let slides = document.getElementsByClassName("mySlides");
  let dots = document.getElementsByClassName("dot");
  if (n > slides.length) {
    slideIndex = 1;
  }
  if (n < 1) {
    slideIndex = slides.length;
  }
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex - 1].style.display = "block";
  dots[slideIndex - 1].className += " active";
}
//---------------------------------------------Navigate-Scroll----------------------------------------------------
window.onscroll = function () {
  myFunction();
};
var header;
var sticky = 650;
function getvar() {
  header = document.getElementById("myHeader");
}
function myFunction() {
  if (window.scrollY > sticky) {
    header.classList.add("solid");
  } else {
    header.classList.remove("solid");
  }
}
//-----------------------------------------------------TOUR-------------------------------------------------------------
var num = 0;
var tour_info = [];

function displayTour_food(num, des) {
  var url = "img/img-food" + num + ".jpg";
  document.querySelector(".tour-img.img.food").setAttribute("src", url);
  // document.querySelector(".tour-info-header").textContent = "Food";
  document.querySelector(".tour-info-text").textContent = des;
}
function displayTour_history(num, des) {
  var url = "img/img-history" + num + ".jpg";
  document.querySelector(".tour-img.img.history").setAttribute("src", url);
  // document.querySelector(".tour-info-header").textContent = "Delicious Food";
  document.querySelector(".tour-info-text").textContent = des;
}
function displayTour_sport(num, des) {
  var url = "img/img-sport" + num + ".jpg";
  document.querySelector(".tour-img.img.sport").setAttribute("src", url);
  // document.querySelector(".tour-info-header").textContent = "Delicious Food";
  document.querySelector(".tour-info-text").textContent = des;
}

function display_addTour() {
  var newItem = document.createElement("div");
  newItem.classList.add("item");
  var innerDiv = document.createElement("div");
  innerDiv.classList.add("tour-add");
  innerDiv.textContent = "THÊM/XÓA";
  newItem.onclick = function () {
    displayTourform();
  };
  newItem.appendChild(innerDiv);
  var listY = document.querySelector(".list-y");
  listY.appendChild(newItem);
}
function displayTourform() {
  var form = document.querySelector(".rm-add-tour");
  form.style.display = "block";
}
function closeTourform() {
  var form = document.querySelector(".rm-add-tour");
  form.style.display = "none";
}
function addTourfisrt(name, index) {
  num++;
  var newItem = document.createElement("div");
  newItem.classList.add("item");
  newItem.classList.add("item" + index);
  var id = "item" + index;
  newItem.id = id;
  var innerDiv = document.createElement("div");
  innerDiv.classList.add("tour-name");
  innerDiv.textContent = name;
  newItem.onclick = function () {
    displayTour_food(index);
    displayTour_history(index);
    displayTour_sport(index);
  };
  newItem.appendChild(innerDiv);
  var listY = document.querySelector(".list-y");
  listY.appendChild(newItem);
}
function addTour(name) {
  num++;
  var newItem = document.createElement("div");
  newItem.classList.add("item");
  newItem.classList.add("item" + num);
  var innerDiv = document.createElement("div");
  innerDiv.classList.add("tour-name");
  innerDiv.textContent = name;
  newItem.onclick = function () {
    displayTour_food(num);
    displayTour_history(num);
    displayTour_sport(num);
  };
  newItem.appendChild(innerDiv);
  var listY = document.querySelector(".list-y");
  var lastItem = listY.lastElementChild;
  listY.insertBefore(newItem, lastItem);
}
function removeItem(itemId) {
  var itemToRemove = document.getElementById(itemId);

  // Check if the item exists
  if (itemToRemove) {
    itemToRemove.parentNode.removeChild(itemToRemove);
  } else {
    console.error("Item not found:", itemId);
  }
}
function display_rmTours() {
  var items = document.querySelectorAll(".list-y .item");
  var rmlist = document.querySelector(".tour-lists");
  items.forEach(function (item, index) {
    var rmitem = document.createElement("div");
    rmitem.classList.add("rm-tours");
    rmitem.id = index;
    rmitem.textContent = item.textContent;
    console.log(rmitem.id);
    rmitem.onclick = function () {
      var indexitem = parseInt(rmitem.id);
      var id = "item" + indexitem;
      console.log(id);
      removeItem(id);
      removeItem(rmitem.id);
    };
    rmlist.appendChild(rmitem);
  });
  removeItem(0);
}
