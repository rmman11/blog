<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    <div class="card-body">

      <div class="row">
           <div class="col">
               <form class="form-inline mt-3">
                   <label class="sr-only" for="inlineFormInputName2">Produs/Serviciu</label>
                   <input type="text" class="form-control mb-2 mr-sm-2" id="product" placeholder="Produs/Serviciu" required>

                   <label class="sr-only" for="inlineFormInputGroupUsername2">Suma</label>
                   <div class="input-group mb-2 mr-sm-2">
                       <input type="number" class="form-control" id="moneyAmount" placeholder="Suma">
                   </div>

                   <button id='addRecord' type="button" class="btn btn-primary mb-2">Adauga</button>

               </form>
           </div>
       </div>

       <div class="row mt-3">
           <table class="table table-sm">
               <thead class="thead-dark">
                   <tr>
                       <th scope="col">Produs/Serviciu</th>
                       <th scope="col">Suma cheltuita</th>
                       <th scope="col">Stergere</th>
                   </tr>
               </thead>
               <tbody class="tableBody">
                   <tr>
                       <td><strong>TOTAL</strong></td>
                       <td class="totalSumTable"><strong>0</strong></td>

                   </tr>
               </tbody>
           </table>
       </div>
  </div>
<script>

  var button = document.querySelector('#addRecord');
  var amountToAdd = document.querySelector('#moneyAmount');
  var totalsum  = document.querySelector('.totalSumTable');
  var product = document.querySelector('#product');
  var tableBody = document.querySelector('.tableBody');





  button.addEventListener('click', function() {
   /* console.log(product.value);
    console.log(amountToAdd.value);
    console.log(parseFloat(totalsum.innerHTML));*/

    var amountToAddParsed = parseFloat(amountToAdd.value);

    //verifica daca campurile  sunt goale sa ne afiseze o eroare
    if(isNaN(amountToAddParsed)  || product.value === '' || product.value.trim().length === 0) {
  	  alert('Validarea a depistat probleme');
      return;
    };

    var list = document.getElementById('demo');
    var lastid = 0;
    var tablerow = document.createElement('tr');
    var removeButton = document.createElement('button');

    removeButton.setAttribute('onClick','removeName("'+'item'+lastid+'")');


    tablerow.innerHTML = `<td>${product.value}</td>
                          <td>${amountToAddParsed}</td>
                          <td> <a href="#"  onclick=delete_line() title="remove">
                          <i class="fa fa-remove"></i></a> </td>`;

    tableBody.prepend(tablerow);
     totalsum.innerHTML = `<strong>${parseFloat(amountToAdd.value) + parseFloat(totalsum.children[0].innerHTML)}</strong>`;
     amountToAdd.value = '';
     product.value  = '';
  });

  function delete_line(){
  tableBody.deleteRow(0)
  amountToAdd.value = '';
  }

  </script>
