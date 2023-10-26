export default class SimApi {
  
    constructor (requester) {
      this.requester = requester;
    }
  
    /**
     * @returns {*}
    */
     getAllSim() {
      const url = '/api/sim/getAll';
      return this.requester.get(url);
    }
  
    /**
     * @param params
     * @returns {*}
    */
    creatSim(params) {
      const url = '/api/sim/save';
      return this.requester.post(url, params);
    }
  
    /**
     * @param idSim
     * @param data
     * @returns {*}
    */
    updateSim (idSim, data) {
      const url = `/api/sim/update/${idSim}`;
      return this.requester.put(url, data);
    }
  
    /**
     * @param idSim
     * @returns {*}
    */
    deleteSim(idSim) {
        const url = `/api/sim/delete/${idSim}`;
        return this.requester.delete(url);
    }
  
    /**
     * @param toSearch
     * @returns {*}
    */
    searchSim(toSearch) {
      const url = `/api/sim/search`;
      return this.requester.post(url, {toSearch:toSearch});
    }
  
     /**
   * @param params
   * @returns {*}
  */
  filterSim(params) {
    const url = '/api/sim/filter';
    return this.requester.post(url, params);
  }

  };
  