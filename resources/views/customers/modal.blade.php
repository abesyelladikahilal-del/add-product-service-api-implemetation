<div x-data="customerModal()" x-show="open" x-cloak
     class="fixed inset-0 bg-black/40 flex items-center justify-center">
    
    <div class="bg-white rounded-x1 p-6 w-2/3">
        <h2 class="text-x1 font-semibold mb-4" x-text="mode==='add'?'Add customer':'Edit Customer'"></h2>

        <div class="grid grid-cols-2 gab-4">
            <input x-model="form.name" placeholder="Name" class="border p-2 rounded">
            <input x-model="form.company" placeholder="Company" class="border p-2 rounded">
            <input x-model="form.email" placeholder="email" class="border p-2 rounded">
            <input x-model="form.phone" placeholder="phone" class="border p-2 rounded">
            <input x-model="form.country" placeholder="country" class="border p-2 rounded">

            <select x-model="form.status" class="border p-2 rounded">
                <option>Active</option>
                <option>Inactive</option>
            </select>
        </div>

        <div class="flex justify-end mt-6 gab-3">
            <button @click="open=false" class="px-4 py-2 border rounded">Cancel</button>

            <button @click="submit"()"
                class="px-4 py-2 bg-indigo-600 text-white rounded-lg shadow">
                save
            </button>
        </div>
    </div>

</div>
    

<script>
document.addEventListener('alpine:init', () => {
    Alpine.data('customerModal', () => ({
        open: false,
        mode: 'add',
        form: {},
        init() {
            window.addEventListener('open-add', () => {
                this.mode = 'add';
                this.form ={name:'', company:'', email:'', phone:'', country:'', status:'Active'};
                this.open = true;
            });
        },
        async submit() {
            const url = this.mode === 'add' ? '/costomers' = '//costomers/${this.form.id}';
            const method = this.mode === 'add' ? 'POST' : 'PUT';
            
            await fetch(url, {
                method: method,
                headers: {'content-Type':'application/json','X-CSRF-TOKEN':'{{ csrf_token() }}'},
                body: JSON.stringify(this.form)
            });

            location.reload();
        }
    }))
});
</script>