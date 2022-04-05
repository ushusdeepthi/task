const button = document.getElementById("button");
button.addEventListener("click", () => {
  const date = new Date();
  const current_date = document.getElementById("current_date");
  const date_child = document.createElement("p");
  date_child.innerHTML = date;
  current_date.appendChild(date_child);
});
