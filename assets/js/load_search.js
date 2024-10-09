jQuery(document).ready(function($) {

    const list = document.querySelectorAll('.simplecharm-select-options li');


    $('#simplecharm-advanced-search-form').on('submit', function(e){
        e.preventDefault();
        let search_term = $('.search-field').val();
        let categories = getCategories();
        let page = 1;
        requestPosts(e,search_term,categories,page);
    });

    let paginationLink = document.querySelectorAll('.simplecharm-searchpage-pagination a');

    function getCategories(){
            let selectedOptions = document.getElementById('categories').selectedOptions;
            let selectedNames = [];


            for (let i = 0; i < selectedOptions.length; i++) {
                let nameValue = selectedOptions[i].getAttribute('name');
                selectedNames.push(nameValue);
            }

            return selectedNames;
    }

function requestPosts(e,search_term,categories,page) {
        let pagination = document.querySelector('.simplecharm-searchpage-pagination');
            pagination.innerHTML = '';

        let totalPage = 1;

        let apiUrl = new URL('/wp-json/wp/v2/posts', window.location.origin);
        let params = new URLSearchParams();

        if (search_term) {
            params.append('search', search_term);
        }

        if (categories.length > 0) {
            params.append('categories', categories.join(',')); 
        }

        if(page){
            params.append('page',page);
        }

        $('#simplecharm-loading-overlay').show();

         fetch(apiUrl + '?' + params.toString())
        .then(response => {
            totalPage = response.headers.get('X-WP-TotalPages');
            return response.json()
        })
        .then(posts => {
            let resultsContainer = document.getElementById('simplecharm-search-page');
            resultsContainer.innerHTML = ''; // Clear previous results

            // Check if there are posts
            if (posts.length > 0) {
                posts.forEach(post => {
                    let date = new Date(post.date);
                    let options = { year: 'numeric', month: 'long', day: 'numeric' };
                    post.date = date.toLocaleDateString('en-US', options);
                    let postdate = post.date;
                    if((post.title.rendered.length) <= 0){
                        postdate = `<a href="${post.link}">${post.date}</a>`;
                    }

                    let postElement = document.createElement('div');
                    postElement.classList.add(`post-${post.id}`,'simplecharm-text-center', 'simplecharm-content');
                    postElement.innerHTML = `
            <h1 class="post-title">
                <a href="${post.link}">${post.title.rendered}</a>
            </h1>
            <div class="post-meta">
                <span class="post-date">
                ${postdate}
                </span>
            </div>
            <div class="post-content">
                ${post.excerpt.rendered}
            </div> `;
        resultsContainer.appendChild(postElement);
                });
                if(totalPage > 1){
                    let pagination = document.querySelector('.simplecharm-searchpage-pagination');
                    pagination.innerHTML = '';
                    for(let i = 1;i <= totalPage;i++){
                        let pageBtn = document.createElement('a');
                        pageBtn.classList.add(i);
                        pageBtn.classList.add(page == i ? 'active' : 'inactive');
                        pageBtn.innerText = i;
                        pagination.appendChild(pageBtn);
                        pageBtn.addEventListener("click",function(e){
                            let page = !(pageBtn.classList[0]) ? 1 : pageBtn.classList[0];
                            requestPosts(e,search_term,categories,page);
        });
                    }
                }else{
                    let pagination = document.querySelector('.simplecharm-searchpage-pagination');
                    pagination.innerHTML = '';
                }
            } else {
                resultsContainer.innerHTML = `<p class="simplecharm-text-center">No search results found for "${search_term}"</p>`;
            }
            $('#simplecharm-loading-overlay').hide();
        })
        .catch(error => {
            console.error('Error fetching posts:', error);
            document.getElementById('simplecharm-search-page').innerHTML = '<p>Error fetching posts.</p>';
        });
    }

    

});
