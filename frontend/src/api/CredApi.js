export default class CredApi {
  
    constructor (requester) {
      this.requester = requester;
    }
  
    /**
     * @returns {*}
    */
    getAllCred() {
      const url = '/api/cred/getAll';
      return this.requester.get(url);
    }
  
    /**
     * @param params
     * @returns {*}
    */
    creatCred(params) {
      const url = '/api/cred/save';
      return this.requester.post(url, params);
    }
  
    /**
     * @param idCred
     * @param data
     * @returns {*}
    */
    updateCred (idCred, data) {
      const url = `/api/cred/update/${idCred}`;
      return this.requester.put(url, data);
    }
  
    /**
     * @param idCred
     * @returns {*}
    */
    deleteCred(idCred) {
        const url = `/api/cred/delete/${idCred}`;
        return this.requester.delete(url);
    }
  
    /**
     * @param toSearch
     * @returns {*}
    */
    searchCred(toSearch) {
      const url = `/api/cred/search`;
      return this.requester.post(url, {toSearch:toSearch});
    }
  
      /**
   * @param params
   * @returns {*}
  */
  filterCred(params) {
    const url = '/api/cred/filter';
    return this.requester.post(url, params);
  }

  };
  