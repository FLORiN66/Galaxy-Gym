<template>
    <div class="flex">
        <div class="w-24 h-24">
            <img :src="image">
        </div>
        <div class="w-full ml-5">
            <label class="block text-sm font-medium text-gray-700">Incarca logo</label>
            <file-pond
                name="image"
                ref="pond"
                label-idle="Faceti clic pentru a alege imaginea sau trageti aici imaginea dorita"
                accepted-file-types="image/*"
                max-file-size="2MB"
                @init="filepondInitialized"
                @processfile="handleProcessedFile"
            />
        </div>

    </div>
</template>
<script>
import vueFilePond, {setOptions} from 'vue-filepond';
import 'filepond/dist/filepond.min.css';
import FilePondPluginFileValidateType from 'filepond-plugin-file-validate-type';
import FilePondPluginFileValidateSize from 'filepond-plugin-file-validate-size';

const FilePond = vueFilePond(FilePondPluginFileValidateType, FilePondPluginFileValidateSize);

setOptions({
    server: {
        process: {
            url: './upload',
            headers: {
                'X-CSRF-TOKEN': document.head.querySelector('meta[name=csrf-token]').content
            }
        }
    }
});

export default {
    components: {FilePond},
    data() {
        return {
            image: String()
        }
    },
    mounted() {
        axios.get('/image')
            .then((response) => {
                this.image = response.data;
            })
            .catch((error) => {
                console.error(error);
            })
    },
    methods: {
        filepondInitialized() {
            console.log('Filepond object: ', this.$refs.pond)
        },
        handleProcessedFile(error, file) {
            if(error) {
                console.error(error);
                return;
            }

            this.image = file.serverId;
        }
    }
};
</script>
