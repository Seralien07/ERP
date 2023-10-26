export default class MatApi {
  
    constructor (requester) {
      this.requester = requester;
    }
  
    /**
     * @returns {*}
    */
     getAllMat() {
      const url = '/api/mat/getAll';
      return this.requester.get(url);
    }
  
    /**
     * @param params
     * @returns {*}
    */
    creatMat(params) {
      const url = '/api/mat/save';
      return this.requester.post(url, params);
    }
  
    /**
     * @param idMat
     * @param data
     * @returns {*}
    */
    updateMat (idMat, data) {
      const url = `/api/mat/update/${idMat}`;
      return this.requester.put(url, data);
    }
  
    /**
     * @param idMat
     * @returns {*}
    */
    deleteMat(idMat) {
        const url = `/api/mat/delete/${idMat}`;
        return this.requester.delete(url);
    }
  
    /**
     * @param toSearch
     * @returns {*}
    */
    searchMat(toSearch) {
      const url = `/api/mat/search`;
      return this.requester.post(url, {toSearch:toSearch});
    }

    /**
   * @param params
   * @returns {*}
  */
    filterMat(params) {
      const url = '/api/mat/filter';
      return this.requester.post(url, params);
    }
  
  };
  