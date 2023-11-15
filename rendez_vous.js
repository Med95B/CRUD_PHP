function updateSelectedDate() {
    var date = new Date(document.getElementById("date").value);
    var options = { weekday: 'long', month: 'long', day: 'numeric', year: 'numeric'};
    var formattedDate = date.toLocaleDateString('fr-FR', options);
    document.getElementById("selected-date").textContent = formattedDate+", ";
  }

  document.getElementById("date").addEventListener("change", function() {
    updateSelectedDate();
  });

  document.getElementById("prev-date").addEventListener("click", function() {
    var date = new Date(document.getElementById("date").value);
    date.setDate(date.getDate() - 1);
    document.getElementById("date").valueAsDate = date;
    updateSelectedDate();
  });

  document.getElementById("next-date").addEventListener("click", function() {
    var date = new Date(document.getElementById("date").value);
    date.setDate(date.getDate() + 1);
    document.getElementById("date").valueAsDate = date;
    updateSelectedDate();
  });

  document.getElementById("save-time").addEventListener("click", function() {
    var time = document.getElementById("time").value;
    document.getElementById("time").value = "";
    document.getElementById("timePickerModal").classList.remove("show");
    document.body.classList.remove("modal-open");
    var selectedDate = new Date(document.getElementById("date").value);
    var selectedTime = new Date("1970-01-01T" + time + "Z");
    selectedDate.setHours(selectedTime.getUTCHours(), selectedTime.getUTCMinutes(), 0, 0);
   /* document.getElementById("selected-date").textContent +=", "+selectedTime.toLocaleTimeString('fr-FR', {hour: '2-digit', minute:'2-digit'});*/
   document.getElementById("selected-heure").textContent = selectedTime.toLocaleTimeString('fr-FR', {hour: '2-digit', minute:'2-digit'});
  });

document.getElementById('submit').addEventListener('click', function(){
    var heure = document.getElementById("selected-heure").innerHTML;
    document.getElementById("heure").value = heure;
}) ;

