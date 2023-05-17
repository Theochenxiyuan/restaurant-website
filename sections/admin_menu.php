<section id="menu" class="bg-light py-5">
    <div class="container-lg">
        <h1 class="text-center">Menu</h1>
        <div class="text-center"> <button class="btn-lg btn btn-danger">Add Item</button></div>

        <div class="row justify-content-center align-items-center p-2">
            <div class='col-6 col-sm-5 col-md-4 col-lg-3 col-xl-2 my-1'>
                <div class="card">
                    <img src="img/food/dandannoodle.png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <div class="card-title fw-bold">Dan Dan Noodle</div>
                        <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#item-detail">Detail</button>
                    </div>
                    <div class="d-none item-data">
                        <p class="item-price"><span class="fw-bold">Price: </span>$20</p>
                        <p class="item-category"><span class="fw-bold">Category: </span>Rice and Noodles</p>
                        <p class="item-description"><span class="fw-bold">Description: </span>Dan Dan noodle is a popular Chinese dish that typically consists of egg noodles served in a spicy sauce made from chili oil, Sichuan peppercorns, soy sauce, and other seasonings. The dish is usually topped with minced pork, scallions, and peanuts, and sometimes includes vegetables like bok choy or bean sprouts. The name "dan dan" refers to the bamboo pole that street vendors traditionally used to carry the noodles and sauce on their backs. Dan dan noodle is known for its complex and bold flavors, and is a favorite among spicy food lovers.</p>
                        <p class="item-image-file"><span class="fw-bold">Linked Image: </span>dandannoodle.png</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="modal fade" id="item-detail" tabindex="-1" aria-labelledby="item-detail" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5"></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p class="item-price"></p>
                <p class="item-category"></p>
                <p class="item-description"></p>
                <p class="item-image-file"></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-danger">Delete</button>
            </div>
        </div>
    </div>
</div>