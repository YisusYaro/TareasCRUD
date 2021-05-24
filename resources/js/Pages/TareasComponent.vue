<template>
  <app-layout>
            <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Tareas
            </h2>
        </template>
    <dialog
      id="myModal"
      class="h-auto w-11/12 md:w-1/2 p-5 bg-white rounded-md"
    >
      <div class="flex flex-col w-full h-auto">
        <!-- Header -->
        <div class="flex w-full h-auto justify-center items-center">
          <div
            class="flex w-10/12 h-auto py-3 justify-center items-center text-2xl font-bold"
          >
            <div v-if="modoEditar">Editar nota</div>
            <div v-else>Agregar nota</div>
          </div>
          <div
            onclick="document.getElementById('myModal').close();"
            class="flex w-1/12 h-auto justify-center cursor-pointer"
          >
            <svg
              xmlns="http://www.w3.org/2000/svg"
              class="h-6 w-6"
              fill="none"
              viewBox="0 0 24 24"
              stroke="currentColor"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M6 18L18 6M6 6l12 12"
              />
            </svg>
          </div>
          <!--Header End-->
        </div>
        <!-- Modal Content-->
        <div
          class="flex w-full h-auto py-10 px-2 justify-center items-center bg-gray-200 rounded text-center text-gray-500"
        >
          <div class="flex-auto p-5 lg:p-10" v-if="modoEditar">
            <form @submit.prevent="editarNota(nota)">
              <div class="relative w-full mb-3">
                <label
                  class="block uppercase text-gray-700 text-xs font-bold mb-2"
                  >Título</label
                ><input
                  v-model="nota.nombre"
                  type="text"
                  class="border-0 px-3 py-3 rounded text-sm shadow w-full bg-gray-300 text-gray-800 outline-none focus:bg-gray-400"
                  placeholder="¿Cuál es tu tarea?"
                  style="transition: all 0.15s ease 0s"
                  required
                />
              </div>
              <div class="relative w-full mb-3">
                <label
                  class="block uppercase text-gray-700 text-xs font-bold mb-2"
                  >Descripción</label
                ><textarea
                  v-model="nota.descripcion"
                  rows="4"
                  cols="80"
                  class="border-0 px-3 py-3 bg-gray-300 text-gray-800 rounded text-sm shadow focus:outline-none w-full"
                  placeholder="Describe tu tarea..."
                  required
                ></textarea>
              </div>
              <div class="text-center mt-6">
                <button
                  onclick="document.getElementById('myModal').close();"
                  id="feedbackBtn"
                  class="bg-blue-300 text-black text-center mx-auto active:bg-yellow-400 text-sm font-bold uppercase px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1"
                  type="submit"
                  style="transition: all 0.15s ease 0s"
                >
                  COMPLETAR
                </button>
              </div>
            </form>
          </div>

          <div class="flex-auto p-5 lg:p-10" v-else>
            <form @submit.prevent="agregar()">
              <div class="relative w-full mb-3">
                <label
                  class="block uppercase text-gray-700 text-xs font-bold mb-2"
                  >Título</label
                ><input
                  v-model="nota.nombre"
                  type="text"
                  class="border-0 px-3 py-3 rounded text-sm shadow w-full bg-white-300 text-gray-800 outline-none focus:bg-white-400"
                  placeholder="¿Cuál es tu tarea?"
                  style="transition: all 0.15s ease 0s"
                  required
                />
              </div>
              <div class="relative w-full mb-3">
                <label
                  class="block uppercase text-gray-700 text-xs font-bold mb-2"
                  >Descripción</label
                ><textarea
                  v-model="nota.descripcion"
                  rows="4"
                  cols="80"
                  class="border-0 px-3 py-3 bg-white-300 text-gray-800 rounded text-sm shadow focus:outline-none w-full"
                  placeholder="Describe tu tarea..."
                  required
                ></textarea>
              </div>
              <div class="text-center mt-6">
                <button
                  onclick="document.getElementById('myModal').close();"
                  id="feedbackBtn"
                  class="bg-blue-500 hover:bg-blue-700 text-white text-center mx-auto active:bg-yellow-400 text-sm font-bold uppercase px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1"
                  type="submit"
                  style="transition: all 0.15s ease 0s"
                >
                  GUARDAR
                </button>
              </div>
            </form>
          </div>
        </div>
        <!-- End of Modal Content-->
      </div>
    </dialog>

    <div>
      <div class="sm:w-3/3 md:w-2/3 mx-auto">
        <div class="my-5 grid grid-cols-3 gap-4">
          <div class="text-xl font-bold p-3 col-span-2">LISTA</div>
          <div class="pl-20">
            <button
              onclick="document.getElementById('myModal').showModal()"
              @click="editarFormulario(item)"
              id="btn"
              class="p-3 bg-blue-500 hover:bg-blue-700 text-white font-bold rounded-full"
            >
              <svg
                xmlns="http://www.w3.org/2000/svg"
                class="h-6 w-6"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M12 6v6m0 0v6m0-6h6m-6 0H6"
                />
              </svg>
            </button>
          </div>
        </div>

        <div class="bg-white shadow-md rounded my-6">
          <table class="text-left w-full border-collapse">
            <!--Border collapse doesn't work on this site yet but it's available in newer tailwind versions -->
            <thead>
              <tr>
                <th
                  class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light"
                >
                  Título
                </th>
                <th
                  class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light"
                >
                  Descripción
                </th>
                <th
                  class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light"
                >
                  Acciones
                </th>
              </tr>
            </thead>
            <tbody>
              <tr
                class="hover:bg-grey-lighter"
                v-for="(item, index) in notas"
                :key="index"
              >
                <td class="py-4 px-6 border-b border-grey-light">
                  <p>{{ item.nombre }}</p>
                </td>
                <td class="py-4 px-6 border-b border-grey-light">
                  {{ item.descripcion }}
                </td>
                <td class="py-4 px-6 border-b border-grey-light">
                  <button
                    onclick="document.getElementById('myModal').showModal()"
                    class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded-full"
                    @click="editarFormulario(item)"
                  >
                    Editar
                  </button>
                  <button
                    class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-full"
                    @click="eliminarNota(item, index)"
                  >
                    Borrar
                  </button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </app-layout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout";
import Welcome from "@/Jetstream/Welcome";

export default {
  components: {
    AppLayout,
    Welcome,
  },
  data() {
    return {
      notas: [],
      modoEditar: false,
      nota: { nombre: "", descripcion: "" },
    };
  },
  created() {
    axios.get("/tareas").then((res) => {
      console.log(res.data);
      this.notas = res.data;
    });
  },
  methods: {
    agregar() {
      if (
        this.nota.nombre.trim() === "" ||
        this.nota.descripcion.trim() === ""
      ) {
        alert("Debes completar todos los campos antes de guardar");
        return;
      }

      let data = new FormData();
      data.append("nombre", this.nota.nombre);
      data.append("descripcion", this.nota.descripcion);

      const notaNueva = this.nota;
      this.nota = { nombre: "", descripcion: "" };

      axios.post("/tareas", notaNueva).then((res) => {
        const notaServidor = res.data;
        this.notas.push(notaServidor);
      });
    },
    agregarFormulario() {
      this.modoEditar = false;
    },
    editarFormulario(item) {
      this.nota.nombre = item.nombre;
      this.nota.descripcion = item.descripcion;
      this.nota.id = item.id;
      this.modoEditar = true;
    },
    editarNota(nota) {
      const params = { nombre: nota.nombre, descripcion: nota.descripcion };

      this.nota = { nombre: "", descripcion: "" };

      axios.put(`/tareas/${nota.id}`, params).then((res) => {
        this.modoEditar = false;
        const index = this.notas.findIndex((item) => item.id === nota.id);
        this.notas[index] = res.data;
      });
    },
    eliminarNota(nota, index) {
      const confirmacion = confirm(`Eliminar nota ${nota.nombre}`);
      if (confirmacion) {
        axios.delete(`/tareas/${nota.id}`).then(() => {
          this.notas.splice(index, 1);
        });
      }
    },
    cancelarEdicion() {
      this.modoEditar = false;
      this.nota = { nombre: "", descripcion: "" };
    },
  },
};
</script>
