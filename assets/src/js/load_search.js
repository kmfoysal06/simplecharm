(function($){
    class LoadSearch{
        constructor(){
            this.init();
            this.page = 1;
            this.allUsers = [];
        }
        init(){
            this.load_posts();
        }

        load_categories(){
            let selectedOptions = document.getElementById('categories').selectedOptions;
            let selectedNames = [];

            for (let i = 0; i < selectedOptions.length; i++) {
                let nameValue = selectedOptions[i].getAttribute('name');
                selectedNames.push(nameValue);
            }

            return selectedNames;
        }


        load_posts(){
            $('#simplecharm-advanced-search-form').on('submit', (e) => {
            e.preventDefault();
            let search_term = $('.search-field').val();
            let categories = this.load_categories();
            this.requestPosts(e,search_term,categories,this.page);
        });
        }
        async requestPosts(e,search_term,categories,page) {
            let pagination = $('.simplecharm-searchpage-pagination');
                pagination.html('');

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

            try{
            let response = await fetch(apiUrl + '?' + params.toString());
            let posts = await response.json();
            let resultsContainer = $('#simplecharm-search-page');
            resultsContainer.html(''); // Clear previous results
            // .then(response => {
            //     totalPage = response.headers.get('X-WP-TotalPages');
            //     return response.json()
            // })
                // Check if there are posts
                if (posts.length > 0) {
                    for(let post of posts) {
                        let date = new Date(post.date);
                        let options = { year: 'numeric', month: 'long', day: 'numeric' };
                        post.date = date.toLocaleDateString('en-US', options);
                        let postdate = post.date;
                        if((post.title.rendered.length) <= 0){
                            postdate = `<a href="${post.link}">${post.date}</a>`;
                        }
                        const userdata = await this.get_user(post.author);

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
                    <span class="post-author">
                        <a href="${userdata.link}">${userdata.username}</a>
                    </span>
                </div>
                <div class="post-content">
                    ${post.excerpt.rendered}
                </div> `;
            resultsContainer.append(postElement);
            
                    }
                    if(totalPage > 1){
                        let pagination = $('.simplecharm-searchpage-pagination');
                        pagination.html('');
                        for(let i = 1;i <= totalPage;i++){
                            let pageBtn = document.createElement('a');
                            pageBtn.classList.add(i);
                            pageBtn.classList.add(page == i ? 'active' : 'inactive');
                            pageBtn.innerText = i;
                            pagination.append(pageBtn);
                            pageBtn.addEventListener("click",(e) => {
                                this.page = !(pageBtn.classList[0]) ? 1 : pageBtn.classList[0];
                                this.requestPosts(e,search_term,categories,this.page);
                    });
                        }
                    }else{
                        let pagination = $('.simplecharm-searchpage-pagination');
                        pagination.html('');
                    }
                } else {
                    resultsContainer.innerHTML = `<p class="simplecharm-text-center">No search results found for "${search_term}"</p>`;
                }
                $('#simplecharm-loading-overlay').hide();
            }catch(error){
                console.error('Error fetching posts:', error);
                document.getElementById('simplecharm-search-page').innerHTML = '<p>Error fetching posts.</p>';
                $('#simplecharm-loading-overlay').hide();
            };
        }
        async get_user(id){
            /**
             * Limiting The Ajax Search for Same User
             */

            if(!(id in this.allUsers)){
                let userDetails = await this.load_user(id);
                this.allUsers[id] = userDetails;
                return userDetails;
            }else{
                return this.allUsers[id];
            }
        }
        async load_user(id){
            const data = new FormData();
            data.append('action', 'simplecharm_get_user_info');
            data.append('user_id', id);

            try{
                const response = await fetch(admin_data.ajax_url, {
                    method: 'POST',
                    body: data
                });
                const result = await response.json();

                if(!result.error){
                    return result
                }
            }catch(error){
                throw error;
            }

            return userdata;
        }
    }

    new LoadSearch;

})(jQuery)