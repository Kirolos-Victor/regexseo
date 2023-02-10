<template>
    <div class="my-container">
        <div class="row">
            <div class="col-lg-2 col-sm-12 col-md-4" v-for="image in images">
                <image-approve :image="image"></image-approve>
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
import ImageApprove from "../components/ImageApprove";

export default {
    name: "ApprovePage",
    components: {ImageApprove},
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
                url = '/admin/approve';
            } else {
                url = '/admin/approve?page=' + this.nextPage;
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
<style scoped>

</style>
