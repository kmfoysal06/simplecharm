jQuery(document).ready(function($) {

    const list = document.querySelectorAll('.simplecharm-select-options li');


    $('#simplecharm-advanced-search-form').on('submit', function(e) {
        e.preventDefault();
        
        let search_term = $('.search-field').val();
        let categories = getCategories();

        let apiUrl = new URL('/wp-json/wp/v2/posts', window.location.origin);
        let params = new URLSearchParams();

        if (search_term) {
            params.append('search', search_term);
        }

        if (categories.length > 0) {
            params.append('categories', categories.join(',')); 
        }

        $('#simplecharm-loading-overlay').show();

         fetch(apiUrl + '?' + params.toString())
        .then(response => response.json())
        .then(posts => {
            let resultsContainer = document.getElementById('simplecharm-search-page');
            resultsContainer.innerHTML = ''; // Clear previous results

            // Check if there are posts
            if (posts.length > 0) {
                $('#simplecharm-loading-overlay').hide();
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
            } else {
                resultsContainer.innerHTML = '<p>No posts found.</p>';
            }
        })
        .catch(error => {
            console.error('Error fetching posts:', error);
            document.getElementById('simplecharm-search-page').innerHTML = '<p>Error fetching posts.</p>';
        });
    });


    function getCategories(){
            let selectedOptions = document.getElementById('categories').selectedOptions;
            let selectedNames = [];


            for (let i = 0; i < selectedOptions.length; i++) {
                let nameValue = selectedOptions[i].getAttribute('name');
                selectedNames.push(nameValue);
            }

            return selectedNames;
    }

    function getAuthorDetails(authorId) {
    return fetch(`/wp-json/wp/v2/users/${authorId}`)
        .then(response => {
            if (!response.ok) {
                throw new Error(`Author not found (ID: ${authorId})`);
            }
            return response.json();
        })
        .then(author => {
            return {
                name: author.name,
                url: author.url
            };
        })
        .catch(error => {
            console.error('Error fetching author details:', error);
            return null; // Return null in case of an error
        });
}

    

});
