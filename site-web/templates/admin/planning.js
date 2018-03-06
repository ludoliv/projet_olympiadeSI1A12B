let actuel;
let actuel2;
document.addEventListener("DOMContentLoaded", function(){
  let all_tasks = new Array();

  $("#planning").fullCalendar({
    defaultView: 'listDay',
    events:[],
    eventClick: function() {showDetails($(this)[0]);}
  });

  $("#prev").click(function(){
    $("#planning").fullCalendar("prev");
  });

  $("#next").click(function(){
    $("#planning").fullCalendar("next");
  });

  $("#day").click(function(){
    $("#planning").fullCalendar('changeView',"agendaDay");
  });

  $("#list-day").click(function(){
    $("#planning").fullCalendar('changeView','listDay');
  });

  $("#week").click(function(){
    $("#planning").fullCalendar('changeView',"agendaWeek");
  });

  $("#month").click(function(){
    $("#planning").fullCalendar('changeView','month');
  });

  document.getElementById('task-add').onclick = function(e){
    e.preventDefault();
    let err = false;
    $('#list-err').empty();
    if(document.getElementById('date').value == []){
      $('#list-err').append("<li>Veuillez renseigner une date.</li>");
      err=true;
    }
    if(document.getElementById('jury').value == -1){
      $('#list-err').append("<li>Veuillez renseigner un jury.</li>");
      err=true;
    }
    if(document.getElementById('grp').value == -1){
      $('#list-err').append("<li>Veuillez renseigner un groupe.</li>");
      err=true;
    }
    if(document.getElementById('hours').value == -1){
      $('#list-err').append("<li>Veuillez renseigner une plage horaire.</li>");
      err=true;
    }
    if(err)
      $('#errors').addClass("alert alert-danger text-danger");
    if(!err){
      addTask();
      $('#list-err').empty();
      $('#errors').removeClass("alert alert-danger text-danger");
    }
  }
  function addTask(){
    let jury = document.getElementById('jury').value;
    let grp = document.getElementById('grp').value;
    let date = (document.getElementById('date').value).split('-');
    let hours =  document.getElementById('hours').value;
    date = date[0]+"-"+date[1]+"-"+date[2];
    document.getElementById("deb-H").value = hours.split(" ")[0];
    document.getElementById("fin-H").value = hours.split(" ")[2];
    let task =
    {
      'id': $('#planning').fullCalendar('clientEvents').length,
      'title': 'Jury n°'+jury+" - Groupe n°"+grp,
      'start': (date+"T"+hours.split('-')[0].split(' ')[0]),
      'end': (date+"T"+hours.split('-')[1].split(' ')[1])
    };
    all_tasks.push(new Task('Jury n°'+jury+" - Groupe n°"+grp,(date+"T"+hours.split('-')[0].split(' ')[0]),(date+"T"+hours.split('-')[1].split(' ')[1]),jury,grp,hours));
    $('#planning').fullCalendar('addEventSource',[task]);
  }

  function Task(titre, start, end, jury, grp, hours){
    this._titre = titre;
    this._start = start;
    this._end = end;
    this._jury = jury;
    this._grp = grp;
    this._hours = hours;
  }

  function showDetails(t){
    for (task of all_tasks) {
      if(t.innerText.includes(task._titre)){
        setCurrentTask(task);
        displayDetails(task);
        break;
      }
    }
  }

  function displayDetails(t){
    $("#details").empty();
    $("#details").append(
      '\
        <div>\
          <form id="modify-task-form" class="jumbotron bg-dark text-white">\
            <h1 class="h1 text-center">'+t._titre+'</h1>\
            <div class="form-group form-row">\
              <label for="jury-details" class="col-1 col-sm-2 col-md-1 col-lg-1 col-form-label">Jury</label>\
              <div class="col-12 col-sm-10 col-md-12 col-lg-12">\
                <select id="jury-details" class="form-control">\
                </select>\
              </div>\
            </div>\
            <div class="form-group form-row">\
              <label for="grp-details" class="col-1 col-sm-2 col-md-1 col-lg-1 col-form-label">Groupe</label>\
              <div class="col-12 col-sm-10 col-md-12 col-lg-12">\
                <select id="grp-details" class="form-control">\
                </select>\
              </div>\
            </div>\
            <div class="form-group form-row">\
              <label for="date-details" class="col-1 col-sm-2 col-md-1 col-lg-1 col-form-label">Date</label>\
              <div class="col-12 col-sm-10 col-md-12 col-lg-12">\
                <input type="date" pattern="yyyy-mm-dd" id="date-details" class="form-control"></input>\
              </div>\
            </div>\
            <div class="form-group form-row">\
              <label for="hours-details" class="col-1 col-sm-2 col-md-1 col-lg-1 col-form-label">Heure</label>\
              <div class="col-12 col-sm-10 col-md-12 col-lg-12">\
                <select id="hours-details" class="form-control">\
                </select>\
              </div>\
            </div>\
            <div class="form-row justify-content-center">\
              <div id="errors-details" class="col-12 col-sm-10 col-md-11 col-lg-12">\
                <ul id="list-err-details"></ul>\
              </div>\
              <button id="task-modify" type="button" class="btn btn-light"> Modifier </button>\
            </div>\
          </form>\
        </div>'
    );
    for (option of document.getElementById('jury').children) {
      $('#jury-details').append(option.outerHTML);
    }
    for (option of document.getElementById('grp').children) {
      $('#grp-details').append(option.outerHTML);
    }
    for (option of document.getElementById('hours').children) {
      $('#hours-details').append(option.outerHTML);
    }
    document.getElementById('task-modify').onclick = function(e){
      e.preventDefault();
      let err = false;
      $('#list-err-details').empty();
      if(document.getElementById('date-details').value == []){
        $('#list-err-details').append("<li>Veuillez renseigner une date.</li>");
        err=true;
      }
      if(document.getElementById('jury-details').value == -1){
        $('#list-err-details').append("<li>Veuillez renseigner un jury.</li>");
        err=true;
      }
      if(document.getElementById('grp-details').value == -1){
        $('#list-err-details').append("<li>Veuillez renseigner un groupe.</li>");
        err=true;
      }
      if(document.getElementById('hours-details').value == -1){
        $('#list-err-details').append("<li>Veuillez renseigner une plage horaire.</li>");
        err=true;
      }
      if(err)
      $('#errors-details').addClass("alert alert-danger text-danger");
      if(!err){
        modifyTask();
        $('#list-err-details').empty();
        $('#errors-details').removeClass("alert alert-danger text-danger");
      }
    }
  }

  function setCurrentTask(task){
    for (t of $("#planning").fullCalendar('clientEvents')) {
      if(t["title"].includes(task._titre)){
        actuel = t;
        actuel2 = task;
        console.log(actuel);
        console.log(actuel2);
      }
    }
  }


  function modifyTask(){
    for (task of all_tasks) {
      if(actuel["title"].includes(task._titre)){
        actuel["title"] = 'Jury n°'+document.getElementById('jury-details').value+" - Groupe n°"+document.getElementById('grp-details').value
        actuel["start"] = (document.getElementById("date-details").value+"T"+document.getElementById("hours-details").value.split('-')[0].split(' ')[0])
        actuel["end"] = (document.getElementById("date-details").value+"T"+document.getElementById("hours-details").value.split('-')[1].split(' ')[1])

        actuel2["_titre"] = actuel["title"];
        actuel2["_start"] = actuel["start"];
        actuel2["_end"] = actuel["end"];
        actuel2["_jury"] = document.getElementById('jury-details').value;
        actuel2["_grp"] = document.getElementById('grp-details').value;
        actuel2["_hours"] = document.getElementById('hours-details').value;
      }
    }
    $('#planning').fullCalendar('refetchEvents');
    $('#planning').fullCalendar('rerenderEvents');
    console.log('ok');
    console.log(all_tasks);
  }
});
