<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inventory</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>

<div class="container p-5">
    <h1>Inventory Management System</h1><br><br>

    <div class="container">
    <div class="row">
    <div class="col">

  <!--form-->
  
      <form action="{{ route('product.store') }}" method="POST">
      @csrf
            <div class="form-group">
              <label for="name">Item Name</label>
              <input type="text" class="form-control" id="name" name="name" placeholder="Enter name" required >
            </div><br>
      
            <div class="form-group">
              <label for="description">Description</label>
              <input type="text" class="form-control" id="description" name="description"  placeholder="Enter description" required></textarea>
            </div><br>
      
      
        <div class="form-group">
            <label for="cost">Cost</label>
            <input type="number" class="form-control" id="cost" name="cost" placeholder="Enter cost" required>
          </div><br>
    
          <div class="form-group">
            <label for="quantity">Quantity</label>
            <input type="number" class="form-control" id="quantity" name="quantity" placeholder="Enter quantity" required>
          </div><br>
          
          <div class="form-group text-end">
          <button type="submit" class="btn btn-outline-primary">Submit</button>
          </div>
        
</form>
<br>

</div>
    <div class="col">
<!--tabel-->


    
<table class="table">
    <thead>
      <tr>
        <th scope="col">Item Name</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
    @foreach($products as $product)
      <tr>
                    <td>{{ $product->name }}</td>
                    <td>

<!--view button-->
<button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#productModal{{ $product->id }}">
<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
  <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13 13 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5s3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5s-3.879-1.168-5.168-2.457A13 13 0 0 1 1.172 8z"/>
  <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0"/>
</svg>
                            </button>
<!--edit button-->
        <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#editProductModal" 
                    data-id="{{ $product->id }}"
                    data-name="{{ $product->name }}"
                    data-description="{{ $product->description }}"
                    data-cost="{{ $product->cost }}"
                    data-quantity="{{ $product->quantity }}">
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
            <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325"/>
          </svg>
        </button>
<!--delete button-->
        <form action="{{ route('product.destroy', $product->id) }}" method="POST" style="display:inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-outline-danger" onclick="return confirm('Are you sure you want to delete this product?');">
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
            <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5"/>
          </svg>
        </button>
</form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  </div>
  </div>
</div>

<!--view details model-->
@foreach($products as $product)
            <!-- Modal -->
            <div class="modal fade" id="productModal{{ $product->id }}" tabindex="-1" role="dialog" aria-labelledby="productModalLabel{{ $product->id }}" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="productModalLabel{{ $product->id }}">Product Details</h5>
                            
                        </div>
                        <div class="modal-body">
                            <!-- Product Details -->
                            <p><strong>Serial No:</strong> {{ $product->id }}</p>
                            <p><strong>Item Name:</strong> {{ $product->name }}</p>
                            <p><strong>Description:</strong> {{ $product->description }}</p>
                            <p><strong>Cost:</strong> {{ $product->cost }}</p>
                            <p><strong>Quantity:</strong> {{ $product->quantity }}</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

<!--tabel-->

</div>
<!--edit form-->
<div class="modal fade" id="editProductModal" tabindex="-1" role="dialog" aria-labelledby="editProductModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="editProductForm" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="editProductModalLabel">Edit Product</h5>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="productId" name="id">

                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="productName" name="name" required>
                    </div>

                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="productDescription" name="description" required></textarea>
                    </div>

                    <div class="form-group">
                        <label for="cost">Cost</label>
                        <input type="number" class="form-control" id="productCost" name="cost" required>
                    </div>

                    <div class="form-group">
                        <label for="quantity">Quantity</label>
                        <input type="number" class="form-control" id="productQuantity" name="quantity" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-outline-success">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

<script>
    // When the edit button is clicked
    $('#editProductModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget); // Button that triggered the modal
        var id = button.data('id');          // Extract info from data-* attributes
        var name = button.data('name');
        var description = button.data('description');
        var cost = button.data('cost');
        var quantity = button.data('quantity');

        var modal = $(this);
        modal.find('#productId').val(id);
        modal.find('#productName').val(name);
        modal.find('#productDescription').val(description);
        modal.find('#productCost').val(cost);
        modal.find('#productQuantity').val(quantity);

        // Update the form's action with the correct product ID
        $('#editProductForm').attr('action', '/product/' + id + '/update');
    });
</script>


  </body>
</html>