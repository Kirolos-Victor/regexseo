<template>
    <div class="my-container">
        <div class="row">
            <div class="col-lg-2 col-sm-12 col-md-4" v-for="image in images">
                <expandable-image :src="'/images/'+image.image" class="img-fluid"/>
                <div class="title">
                    {{ image.title }}
                </div>
                <div class="description">
                    {{ image.description }}
                </div>
                <div class="mt-3" v-if="image.user != null">
                    Author: {{ image.user.name }}
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-center" v-if="nextPage !=null" v-observe-visibility="getImages">
            <!--            <button class="load-more-button" @click.prevent="getImages">LOAD MORE</button>-->
        </div>
        <div class="d-flex justify-content-center mt-5" v-if="loader">
            <div class="loader"></div>
        </div>
    </div>

</template>

<script>
export default {
    name: "FavoritePage",
    data() {
        return {
            images: [],
            nextPage: null,
            loader: false,

        }
    },
    methods: {
        getImages() {
            this.loader = true;
            let url;
            if (this.nextPage == null) {
                url = '/favorites';
            } else {
                url = '/favorites?page=' + this.nextPage;
            }
            axios.get(url).then((data) => {
                this.nextPage = data.data.next_page_url !== null ? data.data.next_page_url.substring(data.data.next_page_url.indexOf('=') + 1) : null;
                this.images = this.images.concat(data.data.data);
                this.loader = false;

            })
        }
    },
    mounted() {
        this.getImages();

    }

}
</script>
