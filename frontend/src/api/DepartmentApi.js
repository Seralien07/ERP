export default class DepartmentApi {
  
  constructor (requester) {
    this.requester = requester;
  }

  /**
   * @returns {*}
  */
  getAllDepartment() {
    const url = '/api/department/getAll';
    return this.requester.get(url);
  }

};
