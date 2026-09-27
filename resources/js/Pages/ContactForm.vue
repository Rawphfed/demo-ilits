<script setup>
import { useForm, usePage } from '@inertiajs/vue3';
import { computed } from 'vue';

const form = useForm({
  nama: '',
  nrp: '',
  fakultas: '',
  pesan: '',
});

const page = usePage();
const successMessage = computed(() => page.props.flash?.success);

function submit() {
  form.post('/contact', {
    preserveScroll: true,
    onSuccess: () => form.reset(),
  });
}
</script>

<template>
  <div class="min-h-screen flex items-center justify-center p-6 bg-slate-50">
    <div class="w-full max-w-md bg-white rounded-xl shadow-md p-8 border border-slate-100">
      <h1 class="text-2xl font-bold text-slate-900 mb-2">Form Masukan Kegiatan X</h1>
      <p class="text-slate-600 mb-6 text-sm">Isi masukan berupa kritik / saran terhadap event X yang telah dilaksanakan.</p>

      <!-- Flash Success Banner -->
      <div v-if="successMessage"
        class="mb-6 p-4 bg-green-50 border border-green-200 text-green-700 rounded-lg text-sm flex items-center gap-2">
        <span>✓</span> {{ successMessage }}
      </div>

      <form @submit.prevent="submit" class="space-y-4">
        <!-- Nama Field -->
        <div>
          <label for="nama" class="block text-sm font-medium text-slate-700 mb-1">
            Nama Lengkap
          </label>
          <input id="nama" v-model="form.nama" type="text" placeholder="Masukkan nama lengkap"
            class="w-full px-3 py-2 border rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
            :class="form.errors.nama ? 'border-red-500' : 'border-slate-300'" />
          <p v-if="form.errors.nama" class="text-red-500 text-xs mt-1">
            {{ form.errors.nama }}
          </p>
        </div>

        <!-- NRP Field -->
        <div>
          <label for="nrp" class="block text-sm font-medium text-slate-700 mb-1">
            NRP
          </label>
          <input id="nrp" v-model="form.nrp" type="text" placeholder="Masukkan NRP"
            class="w-full px-3 py-2 border rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
            :class="form.errors.nrp ? 'border-red-500' : 'border-slate-300'" />
          <p v-if="form.errors.nrp" class="text-red-500 text-xs mt-1">
            {{ form.errors.nrp }}
          </p>
        </div>

        <!-- Fakultas Field -->
        <div>
          <label for="fakultas" class="block text-sm font-medium text-slate-700 mb-1">
            Fakultas
          </label>
          <input id="fakultas" v-model="form.fakultas" list="listFakultas" placeholder="Contoh: FTSPK, FTIRS, FTEIC..."
            class="w-full px-3 py-2 border rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
            :class="form.errors.fakultas ? 'border-red-500' : 'border-slate-300'" />
          <datalist id="listFakultas">
            <option value="FTSPK"></option>
            <option value="FSAD"></option>
            <option value="FTIRS"></option>
            <option value="FTEIC"></option>
            <option value="FDKBD"></option>
            <option value="FTK"></option>
            <option value="FV"></option>
            <option value="SIMT"></option>
          </datalist>
          <p v-if="form.errors.fakultas" class="text-red-500 text-xs mt-1">
            {{ form.errors.fakultas }}
          </p>
        </div>

        <!-- Pesan Field -->
        <div>
          <label for="pesan" class="block text-sm font-medium text-slate-700 mb-1">
            Kritik / Saran
          </label>
          <textarea id="pesan" v-model="form.pesan" rows="4" placeholder="Tuliskan kritik dan saran Anda di sini..."
            class="w-full px-3 py-2 border rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 resize-none"
            :class="form.errors.pesan ? 'border-red-500' : 'border-slate-300'"></textarea>
          <p v-if="form.errors.pesan" class="text-red-500 text-xs mt-1">
            {{ form.errors.pesan }}
          </p>
        </div>

        <!-- Submit Button -->
        <button type="submit" :disabled="form.processing"
          class="w-full bg-blue-600 hover:bg-blue-700 disabled:bg-blue-300 text-white font-medium py-2 px-4 rounded-lg transition-colors text-sm flex items-center justify-center">
          <span v-if="form.processing">Mengirim...</span>
          <span v-else>Kirim Kritik / Saran</span>
        </button>
      </form>
    </div>
  </div>
</template>