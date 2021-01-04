<template>

  <div>

    <div class="container-fluid">
      <div class="row">

        <div class="col">


          <div class="card">
            <div class="card-header">Book purchases</div>
            <div class="card-body">

              <table class="table table-bordered table-sm">
                <thead>
                <tr>
                  <th>Date</th>
                  <th>Book</th>
                  <th>Supplier</th>
                  <th class="text-right">Quantity</th>
                  <th class="text-right">Unit Price</th>
                  <th class="text-right">Total</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="(item, index) in bookPurchases">
                  <td>{{ item.purchase_date }}</td>
                  <td>{{ item.book.book_title }}</td>
                  <td>{{ item.supplier.supplier_name }}</td>
                  <td class="text-right">{{ item.quantity }}</td>
                  <td class="text-right">{{ getUnitPriceLabel(item.unit_price) }}</td>
                  <td class="text-right">{{ getTotalPriceLabel(item.quantity, item.unit_price) }}</td>
                </tr>
                </tbody>
              </table>

            </div>
          </div>

        </div><!-- col -->

      </div>
    </div><!-- container -->

  </div><!-- template -->

</template>

<script>

const _ = require('lodash');

export default {
  name: "ViewAllBookPurchases",

  data() {
    return {
      bookPurchases: {},
    }
  },

  computed: {},

  mounted() {
    this.fetchBookPurchases();
  },

  methods: {
    fetchBookPurchases() {

      $.get(`${getSiteURL()}/api/get/book-purchases.php`)
          .done(r => {
            this.bookPurchases = r.data;
          })
          .fail(e => {
            console.log(e);
          })

    },

    /*
    * PRIVATE METHODS
    * */
    getUnitPriceLabel: function (price) {
      return `${price.toFixed(2)} BHD`
    },

    getTotalPriceLabel: function (quantity, price) {
      const total = _.toNumber(quantity) * _.toNumber(price);
      return `${total.toFixed(2)} BHD`;
    }


  },
}
</script>

<style scoped>

</style>