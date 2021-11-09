import Alpine from 'alpinejs'

window.Alpine = Alpine

Alpine.data('previewProducts', () => ({
    showTableGenProducts: false,
    showProgressBar: false,
    barCounter: 0,
    message: '',
    products: [],
    getProducts() {
        this.barCounter = 1
        this.showTableGenProducts = false
        this.showProgressBar = true
        this.startProgressBar()
        let url = plugin.ajax_url + '?action=' + plugin.action_prodNoSku;
        fetch(url)
            .then((response) => {
                response.json().then(json => {
                    this.message = json.data.message
                    this.products = json.data.products
                    this.barCounter = 100
                    this.showTableGenProducts = true
                    this.showProgressBar = false
                });
            })
            .catch((error) => {
                this.message = error
            })
    },
    startProgressBar() {
        setInterval(() => {
            this.barCounter += 1
        }, 50)
    }
}));

Alpine.data('settingsForm', () => ({
    showBasedOnName: false,
    showBasedOnCategory: false,
    showRandom: false,
    showCustom: false,
    init() {
       this.switchGenerateOptions(plugin.selectedSkuGenerate)
    },
    rangeChange(el, v){
        el.innerHTML = v;
    },
    selectHowToGenerate(opt) {
        this.switchGenerateOptions(opt)
    },
    switchGenerateOptions(v) {
        switch (v) {
            case 'bocp':
                this.showBasedOnName = true;
                this.showBasedOnCategory = this.showRandom = this.showCustom = false;
                break;
            case 'rndm':
                this.showRandom = true;
                this.showBasedOnCategory = this.showBasedOnName = this.showCustom = false;
                break;
            case 'cstm':
                this.showCustom = true;
                this.showBasedOnCategory = this.showRandom = this.showBasedOnName = false;
                break;
        }
    }
}));


Alpine.start()
