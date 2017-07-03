<script>
  export default {
    data() {
      return {
        step1: true,
        step2: false,
        list: [],
        search: {
          everything: '',
        },
        searching: false,
        sortkey: '',
        reverse: false,
        selected_page: '50',
        pagination: {
          total: 0,
          from: 1,
          per_page: 1,
          current_page: 1,
          last_page: 0,
          to: 5
        }
      }
    },
    mounted() {
      this.fetchTable();
    },
    methods: {
      fetchTable() {
        this.searching = true;
        let data = {
          paginate: this.pagination.per_page,
          page: this.pagination.current_page,
          sortkey: this.sortkey,
          reverse: this.reverse,
          per_page: this.selected_page,
          everything: this.search.everything
        };
        axios.get(
          '/api/shops?page=' + data.page +
          '&perpage=' + data.per_page +
          '&sortkey=' + data.sortkey +
          '&reverse=' + data.reverse +
          '&everything=' + data.everything
        ).then((response) => {
          const result = JSON.parse(JSON.stringify(response.data))
            this.list = result.data;
            this.pagination = {
              total: result.total,
              from: result.from,
              to: result.to,
              per_page: result.per_page,
              current_page: result.current_page,
              last_page: result.last_page,
            }
        });
        this.searching = false;
      },
      searchData() {
        this.pagination.current_page = 1;
        this.step2= true;
        this.fetchTable();
      },
      sortBy(sortkey) {
        this.pagination.current_page = 1;
        this.reverse = (this.sortkey == sortkey) ? !this.reverse : false;
        this.sortkey = sortkey;
        this.fetchTable();
      },
      redirectEdit(id) {
        window.location.href = 'shop/' + id + '/edit';
      }
    },
    watch: {
      'selected_page' (val) {
        this.selected_page = val;
        this.pagination.current_page = 1;
        this.fetchTable();
      }
    }
  }
</script>