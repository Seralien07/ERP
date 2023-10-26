export default class CategoryApi {
  
    constructor (requester) {
      this.requester = requester;
    }
  
    /**
     * @returns {*}
    */
    getAllCategory() {
      const url = '/api/category/getAll';
      return this.requester.get(url);
    }
  
  };
  