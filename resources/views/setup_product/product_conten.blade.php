@extends('home_page')

@section('product.view')
<div class="h-12 p-2 w-full bg-white border border-gray-200 rounded shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
    <a href="{{ route('home') }}" class="font-semibold text-blue-600 ml-2">Home</a>
    <i class="fa-solid fa-angle-right ml-1 text-gray-400"></i> Setting
    <i class="fa-solid fa-angle-right ml-1 text-gray-400"></i> Setup
</div>

<div class="container mx-auto pt-4">
    <div class="flex justify-between items-center mb-4">
        <div class="ml-auto">
            <a href="#authentication-modal" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-500 transition">
                Add Product
            </a>
        </div>
    </div>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400" id="product_datatable">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="p-4 text-center">No</th>
                    <th scope="col" class="px-6 py-3 text-center">Product Name</th>
                    <th scope="col" class="px-6 py-3 text-center">Price</th>
                    <th scope="col" class="px-6 py-3 text-center">Category</th>
                    <th scope="col" class="px-6 py-3 text-center">Action</th>
                </tr>
            </thead>
            <tbody class="text-xs text-gray-700 border uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                @foreach ($products as $key => $product)
                    <tr>
                        <td class="p-4 text-center">{{$key+1}}</td>
                        <td class="px-6 py-3 text-center">{{$product->name}}</td>
                        <td class="px-6 py-3 text-center">{{$product->price}}</td>
                        <td class="px-6 py-3 text-center">{{$product->category_id}}</td>
                        <td class="px-6 py-3 text-center">
                            <a href="#authentication-modal"> Edit</button>
                            <button class="btn btn-danger">Delete</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Main modal -->
<div id="authentication-modal" class="fixed inset-0 z-50 flex items-top justify-center bg-black bg-opacity-50 transition-opacity duration-2000 ease-in-out hidden">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-2 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white"><i class="fa-solid fa-pen-to-square pr-2"></i>Product</h3>
                <button class="close-modal text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-xl w-8 h-8 inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white">
                    <span class="sr-only">Close modal</span> &times;
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-4 md:p-5">
                <form class="space-y-4" action="#">
                    <div class="flex items-center">
                        <label for="name" class="w-1/3 text-sm font-medium text-gray-900 dark:text-white">Product Name</label>
                        <input type="text" name="name" id="name" class="w-2/3 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg p-2.5" required />
                    </div>
                    <div class="flex items-center">
                        <label for="price" class="w-1/3 text-sm font-medium text-gray-900 dark:text-white">Price</label>
                        <input type="number" name="price" id="price" class="w-2/3 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg p-2.5" required />
                    </div>
                    <div class="flex items-center">
                        <label for="category_id" class="w-1/3 text-sm font-medium text-gray-900 dark:text-white">Category ID</label>
                        <input type="text" name="category_id" id="category_id" class="w-2/3 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg p-2.5" required />
                    </div>
                    <div class="flex items-center justify-end mt-6 space-x-4">
                        <button type="button" class="close-modal py-2.5 px-5 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Cancel</button>
                        <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" id="save" onclick="createProduct()">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<style>
    #authentication-modal {
        opacity: 0; /* Hide the modal by default */
    }

    #authentication-modal.show {
        display: flex;
        opacity: 1; /* Make the modal visible */
    }

    /* Modal content transition */
    #authentication-modal .relative {
        opacity: 0; /* Hide the modal content */
        transform: scale(0.75); /* Start smaller */
        transition: opacity 2s ease, transform 2s ease; /* Apply the transition */
    }

    #authentication-modal.show .relative {
        opacity: 1; /* Fade in the modal content */
        transform: scale(1); /* Scale to normal size */
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const modal = document.getElementById('authentication-modal');
        const closeButtons = document.querySelectorAll('.close-modal');

        // Open modal when "Add Product" button is clicked
        document.querySelector('a[href="#authentication-modal"]').addEventListener('click', function(event) {
            event.preventDefault();
            modal.classList.add('show');
        });

        // Close modal when close buttons are clicked
        closeButtons.forEach(button => {
            button.addEventListener('click', function() {
                modal.classList.remove('show');
            });
        });
    });
    function clearForm(){
        $('#name').val("");
        $('#price').val("");
        $('#category_id').val("");
    }

    function createProduct() {
        const name = $('#name').val();
        const price = $('#price').val();
        const category_id = $('#category_id').val();

        $.ajax({
            url: '{{ route("product.create") }}',
            type: 'POST',
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
                name: name,
                price: price,
                category_id: category_id,
            },
            success: function(response) {
               clearForm();
               Swal.fire({
                   position: "top-end",
                   icon: "success",
                   title: response.message,
                   showConfirmButton: false,
                   timer: 1500
               });
            },
            error: function(xhr) {
                alert("Error: " + xhr.responseJSON.message);
            }
        });
    }
</script>

@endsection
