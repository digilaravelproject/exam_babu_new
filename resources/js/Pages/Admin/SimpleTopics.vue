<template>
    <admin-layout>
        <div class="container mx-auto p-4">
            <vue-good-table
                :columns="columns"
                :rows="topics.data"
                :pagination-options="{
                    enabled: true,
                    perPage: topics.meta.pagination.per_page,
                    perPageDropdown: [10, 20, 50, 100]
                }"
                :search-options="{ enabled: true }"
                styleClass="vgt-table striped"
            >
                <!-- Topic ID Column -->
                <template slot="table-column" slot-scope="props">
                    <span v-if="props.column.label === 'Topic ID'" class="font-bold">
                        {{ props.column.label }}
                    </span>
                </template>
            </vue-good-table>
        </div>
    </admin-layout>
</template>

<script>
import AdminLayout from '@/Layouts/AdminLayout'

export default {
    components: { AdminLayout },
    props: {
        topics: Object
    },
    data() {
        return {
            columns: [
                {
                    label: 'Topic ID',
                    field: 'id',
                    sortable: true,
                    width: '100px'
                },
                {
                    label: 'Code',
                    field: 'code',
                    sortable: true
                },
                {
                    label: 'Name',
                    field: 'name',
                    sortable: true
                },
                {
                    label: 'Skill',
                    field: 'skill',
                    sortable: true
                }
            ]
        }
    },
    mounted() {
        console.log('Simple Topics Data:', this.topics.data)
    }
}
</script> 