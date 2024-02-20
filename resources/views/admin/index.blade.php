<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
    crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h1 class="mt-3">liste catégorie</h1>
        <hr>

    </div>

    <a data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-primary" class="mt-3">ajouter
        categorie</a>

    <div class="mt-3">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nom Categorie</th>
                    <th scope="col">Description Categorie</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $index => $c)
                    <tr>
                        <th scope="row">{{ $index }}</th>
                        <td>{{ $c->name }}</td>
                        <td>{{ $c->description }}</td>
                        <td>
                            <a  data-bs-toggle="modal" data-bs-target="#editCategory{{ $c->id }}" class="btn btn-success"> Modifier</a>

                            <a onclick="return confirm('voulez-vouz supprimer cette catégorie ? ') "
                                href="/categorie/delete/{{ $c->id }}" class="btn btn-danger">
                                Supprimer</a>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>



          <!-- Modal Ajourt-->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
          style="display: none;" aria-hidden="true">
          <div class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Ajouter Catégorie</h5><button class="btn p-1"
                          type="button" data-bs-dismiss="modal" aria-label="Close"><svg
                              class="svg-inline--fa fa-times fa-w-11 fs--1" aria-hidden="true" focusable="false"
                              data-prefix="fas" data-icon="times" role="img"
                              xmlns="http://www.w3.org/2000/svg" viewBox="0 0 352 512" data-fa-i2svg="">
                              <path fill="currentColor"
                                  d="M242.72 256l100.07-100.07c12.28-12.28 12.28-32.19 0-44.48l-22.24-22.24c-12.28-12.28-32.19-12.28-44.48 0L176 189.28 75.93 89.21c-12.28-12.28-32.19-12.28-44.48 0L9.21 111.45c-12.28 12.28-12.28 32.19 0 44.48L109.28 256 9.21 356.07c-12.28 12.28-12.28 32.19 0 44.48l22.24 22.24c12.28 12.28 32.2 12.28 44.48 0L176 322.72l100.07 100.07c12.28 12.28 32.2 12.28 44.48 0l22.24-22.24c12.28-12.28 12.28-32.19 0-44.48L242.72 256z">
                              </path>
                          </svg><!-- <span class="fas fa-times fs--1"></span> Font Awesome fontawesome.com --></button>
                  </div>

                  <form action="/categorie/add" method="post">

                      @csrf

                    
                      <div class="modal-body">
                          <div class="mb-3">
                              <label class="form-label" for="exampleFormControlInput1">Nom categorie</label>
                              <input name="name" class="form-control" id="exampleFormControlInput1"
                                  type="text" placeholder=" tapper nom categorie">

                              @error('name')
                                  <div class="alert alert-danger">
                                      {{ $message }}
                                  </div>
                              @enderror
                          </div>

                          <div class="mb-0">
                              <label class="form-label" for="exampleTextarea">Description Categorie</label>
                              <textarea name="description" class="form-control" rows="3"> </textarea>


                              @error('description')
                                  <div class="alert alert-danger">
                                      {{ $message }}
                                  </div>
                              @enderror
                          </div>


                      </div>
                      <div class="modal-footer">
                          <button class="btn btn-primary" type="submit ">Okay</button>
                          <button class="btn btn-outline-primary" type="button"
                              data-bs-dismiss="modal">Cancel</button>
                      </div>
                  </form>
              </div>
          </div>
         </div>






<!-- modal modifiier-->
@foreach ($categories as $index=>$c )
         <div class="modal fade" id="editCategory{{$c->id}}" tabindex="-1" aria-labelledby="exampleModalLabel"
          style="display: none;" aria-hidden="true">
          <div class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Modifier Catégorie</h5><button class="btn p-1"
                          type="button" data-bs-dismiss="modal" aria-label="Close"><svg
                              class="svg-inline--fa fa-times fa-w-11 fs--1" aria-hidden="true" focusable="false"
                              data-prefix="fas" data-icon="times" role="img"
                              xmlns="http://www.w3.org/2000/svg" viewBox="0 0 352 512" data-fa-i2svg="">
                              <path fill="currentColor"
                                  d="M242.72 256l100.07-100.07c12.28-12.28 12.28-32.19 0-44.48l-22.24-22.24c-12.28-12.28-32.19-12.28-44.48 0L176 189.28 75.93 89.21c-12.28-12.28-32.19-12.28-44.48 0L9.21 111.45c-12.28 12.28-12.28 32.19 0 44.48L109.28 256 9.21 356.07c-12.28 12.28-12.28 32.19 0 44.48l22.24 22.24c12.28 12.28 32.2 12.28 44.48 0L176 322.72l100.07 100.07c12.28 12.28 32.2 12.28 44.48 0l22.24-22.24c12.28-12.28 12.28-32.19 0-44.48L242.72 256z">
                              </path>
                          </svg><!-- <span class="fas fa-times fs--1"></span> Font Awesome fontawesome.com --></button>
                  </div>
                  
                      
                  
                  <form action="/categorie/update/{id}" method="post">

                      @csrf

                    
                      <div class="modal-body">
                          <div class="mb-3">
                              <label class="form-label" for="exampleFormControlInput1">Nom categorie</label>
                              <input name="name"  value ="{{$c->name}}"  class="form-control" id="exampleFormControlInput1"
                                  type="text" placeholder=" tapper nom categorie"  >
                              @error('name')
                                  <div class="alert alert-danger">
                                      {{ $message }}
                                  </div>
                              @enderror
                          </div>

                          <div class="mb-0">
                              <label class="form-label" for="exampleTextarea">Description Categorie</label>
                              <textarea name="description"  class="form-control" rows="3">{{$c->description}} </textarea>


                              @error('description')
                                  <div class="alert alert-danger">
                                      {{ $message }}
                                  </div>
                              @enderror
                          </div>
                          <input type="hidden" value="{{ $c->id}}" name="idcategory" >



                      </div>
                      <div class="modal-footer">
                          <button class="btn btn-primary" type="submit ">Okay</button>
                          <button class="btn btn-outline-primary" type="button"
                              data-bs-dismiss="modal">Cancel</button>
                      </div>
                  </form>
              </div>
          </div>
         </div>


@endforeach
   

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

       

</html>