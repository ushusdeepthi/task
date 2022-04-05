const button = document.getElementById("button");
button.addEventListener("click", () => {
  const date = new Date();
  const current_date = document.getElementById("current_date");
  let numb = current_date.childElementCount;
  if (numb < 2) {
    const date_child = document.createElement("p");
    date_child.innerHTML = date;
    current_date.appendChild(date_child);
  }
});
