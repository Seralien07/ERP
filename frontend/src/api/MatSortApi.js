export default class MatSortApi {
  
    constructor (requester) {
      this.requester = requester;
    }
  
    /**
     * @returns {*}
    */
     getAllMatSort() {
      const url = '/api/matSort/getAll';
      return this.requester.get(url);
    }
  
    /**
     * @param params
     * @returns {*}
    */
    creatMatSort(params) {
      const url = '/api/matSort/save';
      return this.requester.post(url, params);
    }
  
    /**
     * @param idMatSort
     * @param data
     * @returns {*}
    */
    updateMatSort (idMatSort, data) {
      const url = `/api/matSort/update/${idMatSort}`;
      return this.requester.put(url, data);
    }
  
    /**
     * @param idMatSort
     * @returns {*}
    */
    deleteMatSort(idMatSort) {
        const url = `/api/matSort/delete/${idMatSort}`;
        return this.requester.delete(url);
    }
  
    /**
     * @param toSearch
     * @returns {*}
    */
    searchMatSort(toSearch) {
      const url = `/api/matSort/search`;
      return this.requester.post(url, {toSearch:toSearch});
    }
  
     /**
   * @param params
   * @returns {*}
  */
  filterMatSort(params) {
    const url = '/api/matSort/filter';
    return this.requester.post(url, params);
  }

  };
  