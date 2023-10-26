export default class StaffApi {
  
  constructor (requester) {
    this.requester = requester;
  }

  /**
   * @returns {*}
  */
   getAllStaff() {
    const url = '/api/staff/getAll';
    return this.requester.get(url);
  }

  /**
   * @param params
   * @returns {*}
  */
  creatStaff(params) {
    const url = '/api/staff/save';
    return this.requester.post(url, params);
  }

  /**
   * @param idStaff
   * @param data
   * @returns {*}
  */
  updateStaff (idStaff, data) {
    const url = `/api/staff/update/${idStaff}`;
    return this.requester.put(url, data);
  }

  /**
   * @param idStaff
   * @returns {*}
  */
  deleteStaff(idStaff) {
      const url = `/api/staff/delete/${idStaff}`;
      return this.requester.delete(url);
  }

  /**
   * @param toSearch
   * @returns {*}
  */
  searchStaff(toSearch) {
    const url = `/api/staff/search`;
    return this.requester.post(url, {toSearch:toSearch});
  }

  /**
   * @param params
   * @returns {*}
  */
  filterStaff(params) {
    const url = '/api/staff/filter';
    return this.requester.post(url, params);
  }

};
