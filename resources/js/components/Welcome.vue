<template>

     <div class="row justify-content-center">
        <div class="col-md-10">
             <h1>{{ title }}</h1>
             <form>
            <div class="row ">
                <div class="col-sm-4">
                    Region: {{selectedRegion}}
                </div>
                <div class="col-sm-4">
                    <select v-model="selectedRegion" @change="changeAreaRegion">
                        <option value="" selected> All Regions</option>
                        <option v-for="(option, $index) in regions" :key="$index" v-bind:value="option.code" >
                            {{ option.name }}
                        </option>
                    </select>
                </div>
            </div>
             <div class="row">
                <div class="col-sm-4">
                    Destination: {{selectedArea}}
                </div>
                <div class="col-sm-8">
                    <select v-model="selectedArea" @change="changeAreaRegion">
                        <option value="" selected>All Areas</option>
                        <option v-for="(option, $index) in areas" :key="$index" v-bind:value="option" >
                            {{ option }}
                        </option>
                    </select>
                </div>
            </div>
            </form>

            
            </div>
     </div>
</template>
<script>
export default {

    setup: () => ({
        title: 'Laravel 8 - Vue.js-3'
    }),

    mounted () {
        this.fetchAreaAndRegionData();
    },

    data() {
        return {
            formLabelWidth: '120px',
            fullscreenLoading: false,
            showModal: false,
            regions:[],
            areas:[],
            list: [],
            infiniteId: +new Date(),
            page: 1,
            size: 10,
            selectedRegion: 'NSW', 
            selectedArea: null, 
            
        };

    },
    
    methods: {
          
         fetchAreaAndRegionData () {
            
                fetch('/api/accommodation')
                    .then(response => {
                       
                        return response.json();
                    }).then(data => {

                        for (const key in data) {
                            if (data.hasOwnProperty(key)) {
                            const value = data[key];
                            this.regions.push({name:value.Name, code: value.Code});
                            }
                        }
                    });

                fetch('/api/accommodation-areas', { params: this.selectedRegion })
                 .then(response => {
                        return response.json();
                    }).then(data => {

                       for (const key in data) {
                            if (data.hasOwnProperty(key)) {
                            const value = data[key];
                            this.areas.push(value.Name);
                            }
                        }
                    });
            
            },

            
            
           
        
     }
    
}
</script>