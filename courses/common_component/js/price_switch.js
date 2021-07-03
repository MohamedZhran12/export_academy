document.querySelectorAll(".myr_currency").forEach(function (item) {
  item.addEventListener("click", function () {
    const dataCourseID = this.getAttribute("data-course-id");
    document.querySelector(`.myr-${dataCourseID}`).classList.remove("d-none");
    document.querySelector(`.usd-${dataCourseID}`).classList.add("d-none");
  });
});

document.querySelectorAll(".usd_currency").forEach(function (item) {
  item.addEventListener("click", function () {
    const dataCourseID = this.getAttribute("data-course-id");
    document.querySelector(`.myr-${dataCourseID}`).classList.add("d-none");
    document.querySelector(`.usd-${dataCourseID}`).classList.remove("d-none");
  });
});
