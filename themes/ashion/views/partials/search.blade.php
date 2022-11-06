@section('extra-css')
<style>
    .search-model .trend__item__pic img {
        width: 100px;
    }
 
</style>
@endsection


<div class="search-model">
    <div class="h-100 d-flex justify-content-center " style="margin-top: 100px">
        <div class="search-close-switch">+</div>
        <div class="row">
            <div class="col-4">
                <form class="search-model-form">
                    <input type="search" id="aa-search-input" class=" aa-input-search"
                        placeholder="Search with algolia..." name="search" autocomplete="on" />
                </form>
            </div>
            <div class="col-8">
                <div class="aa-input-container" id="aa-input-container">

                </div>
            </div>
        </div>
    </div>
</div>



@section('extra-js')
<!-- Include AlgoliaSearch JS Client and autocomplete.js library -->
<script src="https://cdn.jsdelivr.net/algoliasearch/3/algoliasearch.min.js"></script>
<script src="https://cdn.jsdelivr.net/autocomplete.js/0/autocomplete.min.js"></script>
{{-- <script src="{{ asset('js/algolia.js') }}"></script> --}}
<script>
    (function() {
    var client = algoliasearch('P53SZUIML8', '19f54cccab5efbeb0d351b307326a864');
    var index = client.initIndex('products');
    var enterPressed = false;
    //initialize autocomplete on search input (ID selector must match)
    autocomplete('#aa-search-input', { hint: false }, {
        source: autocomplete.sources.hits(index, { hitsPerPage: 5 }),
        //value to be displayed in input control after user's suggestion selection
        displayKey: 'name',
        //hash of templates used when rendering dataset
        templates: {
            //'suggestion' templating function used to render a single suggestion
            suggestion: function(suggestion) {
                const markup = ` 
                    <div class="trend__item">
                        <div class="trend__item__pic">
                            <img src="${window.location.origin}/storage/${suggestion.image}" alt="img">
                        </div>
                        <div class="trend__item__text">
                            <h6>${suggestion._highlightResult.name.value}</h6>
                            
                            <div class="product__price">$${(suggestion.price / 100).toFixed(2)}</div>
                        </div>
                        <div class="algolia-details">
                            <span>${suggestion._highlightResult.details.value}</span>
                        </div>
                    </div> 
                    `;

                return markup;
            },
            empty: function(result) {
                return 'Sorry, we did not find any results for "' + result.query + '"';
            }
        }
    }).on('autocomplete:selected', function(event, suggestion, dataset) {
        window.location.href = window.location.origin + '/shop/' + suggestion.slug;
        enterPressed = true;
    }).on('keyup', function(event) {
        if (event.keyCode == 13 && !enterPressed) {
            window.location.href = window.location.origin + '/search-algolia?q=' + document.getElementById('aa-search-input').value;
        }
    });
})();
</script>
@endsection